<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add User - AquaVie</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
    <div class="flex h-screen bg-gradient-to-br from-gray-50 to-gray-100">
        @include('layouts.admin-sidebar')
        
        <div class="flex-1 flex flex-col overflow-hidden">
            @include('layouts.admin-topbar', ['pageTitle' => 'Add New User'])
            
            <div class="flex-1 overflow-y-auto p-8">
                <div class="max-w-2xl mx-auto">
                    <div class="bg-white rounded-2xl p-8 shadow-lg">
                        <h1 class="text-2xl font-bold mb-6 text-gray-800">Add New User</h1>

                        @if($errors->any())
                        <div class="mb-6 p-4 bg-red-100 border border-red-400 text-red-700 rounded-lg">
                            <ul class="list-disc list-inside">
                                @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif

                        <form action="{{ route('admin.users.store') }}" method="POST" class="space-y-6">
                            @csrf

                            <div>
                                <label class="block text-gray-700 font-medium mb-2">Nama Lengkap *</label>
                                <input type="text" name="name" value="{{ old('name') }}" required
                                       class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:border-teal-500 focus:ring-2 focus:ring-teal-200 transition">
                            </div>

                            <div>
                                <label class="block text-gray-700 font-medium mb-2">Email *</label>
                                <input type="email" name="email" value="{{ old('email') }}" required
                                       class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:border-teal-500 focus:ring-2 focus:ring-teal-200 transition">
                            </div>

                            <div>
                                <label class="block text-gray-700 font-medium mb-2">Phone</label>
                                <input type="text" name="phone" value="{{ old('phone') }}"
                                       class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:border-teal-500 focus:ring-2 focus:ring-teal-200 transition">
                            </div>

                            <div>
                                <label class="block text-gray-700 font-medium mb-2">Password *</label>
                                <input type="password" name="password" required
                                       class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:border-teal-500 focus:ring-2 focus:ring-teal-200 transition">
                            </div>

                            <div>
                                <label class="block text-gray-700 font-medium mb-2">Confirm Password *</label>
                                <input type="password" name="password_confirmation" required
                                       class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:border-teal-500 focus:ring-2 focus:ring-teal-200 transition">
                            </div>

                            <div class="flex gap-4">
                                <button type="submit" 
                                        class="flex-1 px-6 py-3 bg-gradient-to-r from-teal-600 to-cyan-600 text-white rounded-lg hover:shadow-xl transition font-semibold">
                                    Add User
                                </button>
                                <a href="{{ route('admin.users.index') }}" 
                                   class="flex-1 px-6 py-3 bg-gray-100 text-gray-700 rounded-lg hover:bg-gray-200 transition text-center font-semibold">
                                    Cancel
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>