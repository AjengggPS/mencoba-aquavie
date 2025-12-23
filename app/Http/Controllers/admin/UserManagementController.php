<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserManagementController extends Controller
{
    public function index(Request $request)
    {
        // Search functionality
        $search = $request->get('search');
        
        // Ambil data user dari database (exclude admin)
        $users = User::where('email', '!=', 'admin@aquavie.com')
            ->when($search, function($query) use ($search) {
                $query->where('name', 'like', "%{$search}%")
                      ->orWhere('email', 'like', "%{$search}%");
            })
            ->orderBy('created_at', 'desc')
            ->get()
            ->map(function($user) {
    return [
        'id' => $user->id,
        'name' => $user->name,
        'email' => $user->email,
        'phone' => $user->phone ?? '+62 812 3456 7890',
        'city' => $user->city ?? 'Jakarta',  // Tambahkan ini
        'kolam' => 2,
        'device' => true,
        'joinDate' => $user->created_at->format('d M Y'),
    ];
});

        $stats = [
            'total' => User::count(),
            'withDevice' => 456,
            'manualOnly' => 778,
            'newThisMonth' => 42,
        ];

        return view('admin.users', compact('users', 'stats'));
    }

    public function create()
    {
        return view('admin.users-create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
            'phone' => 'nullable|string|max:20',
        ]);

        $validated['password'] = Hash::make($validated['password']);

        User::create($validated);

        return redirect()->route('admin.users.index')->with('success', 'User berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);

        // Prevent editing admin account
        if ($user->email === 'admin@aquavie.com') {
            return redirect()->route('admin.users.index')->with('error', 'Tidak dapat mengedit akun admin!');
        }

        return view('admin.users-edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        // Prevent editing admin account
        if ($user->email === 'admin@aquavie.com') {
            return redirect()->route('admin.users.index')->with('error', 'Tidak dapat mengedit akun admin!');
        }

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . $id,
            'phone' => 'nullable|string|max:20',
        ]);

        // Update password jika diisi
        if ($request->filled('password')) {
            $request->validate([
                'password' => 'string|min:8|confirmed',
            ]);
            $validated['password'] = Hash::make($request->password);
        }

        $user->update($validated);

        return redirect()->route('admin.users.index')->with('success', 'User berhasil diupdate!');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);

        // Prevent deleting admin account
        if ($user->email === 'admin@aquavie.com') {
            return redirect()->route('admin.users.index')->with('error', 'Tidak dapat menghapus akun admin!');
        }

        $user->delete();

        return redirect()->route('admin.users.index')->with('success', 'User berhasil dihapus!');
    }
}