<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index()
    {
        return view('user.profile', ['pageTitle' => 'Edit Profil']);
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string',
            'city' => 'nullable|string',
            'address' => 'nullable|string',
            'has_device' => 'nullable|boolean',
            'device_id' => 'nullable|string',
        ]);

        return back()->with('success', 'Profil berhasil diperbarui!');
    }
}