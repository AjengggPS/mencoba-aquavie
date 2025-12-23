<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Login - AquaVie</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
    <div class="min-h-screen bg-gradient-to-br from-cyan-50 via-blue-50 to-teal-50 flex items-center justify-center p-6">
        <div class="w-full max-w-md">
            <!-- Logo -->
            <a href="{{ url('/') }}" class="flex items-center justify-center gap-3 mb-8">
                <div class="w-14 h-14 bg-gradient-to-br from-teal-500 to-cyan-600 rounded-2xl flex items-center justify-center shadow-lg">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21a4 4 0 01-4-4V5a2 2 0 012-2h4a2 2 0 012 2v12a4 4 0 01-4 4zm0 0h12a2 2 0 002-2v-4a2 2 0 00-2-2h-2.343M11 7.343l1.657-1.657a2 2 0 012.828 0l2.829 2.829a2 2 0 010 2.828l-8.486 8.485M7 17h.01"></path>
                    </svg>
                </div>
                <span class="text-4xl font-bold bg-gradient-to-r from-teal-600 to-cyan-600 bg-clip-text text-transparent">
                    AquaVie
                </span>
            </a>

            <!-- Login Card -->
            <div class="bg-white/70 backdrop-blur-sm rounded-3xl p-8 shadow-xl">
                <h1 class="text-3xl font-bold mb-2 text-center text-gray-800">Selamat Datang</h1>
                <p class="text-center text-gray-600 mb-8">Masuk ke akun Anda</p>

                @if(session('error'))
                <div class="mb-4 p-3 bg-red-100 border border-red-400 text-red-700 rounded-lg">
                    {{ session('error') }}
                </div>
                @endif

                @if($errors->any())
                <div class="mb-4 p-3 bg-red-100 border border-red-400 text-red-700 rounded-lg">
                    <ul class="list-disc list-inside text-sm">
                        @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif

                <form action="{{ route('login') }}" method="POST" class="space-y-4">
                    @csrf
                    <div>
                        <label for="email" class="block text-gray-700 font-medium mb-2">Email</label>
                        <input
                            type="text"
                            id="email"
                            name="email"
                            value="{{ old('email') }}"
                            class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:border-teal-500 focus:ring-2 focus:ring-teal-200 transition"
                            placeholder="Masukkan email"
                            required
                        />
                    </div>

                    <div>
                        <label for="password" class="block text-gray-700 font-medium mb-2">Password</label>
                        <input
                            type="password"
                            id="password"
                            name="password"
                            class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:border-teal-500 focus:ring-2 focus:ring-teal-200 transition"
                            placeholder="Masukkan password"
                            required
                        />
                    </div>

                    <button
                        type="submit"
                        class="w-full px-6 py-3 bg-gradient-to-r from-teal-600 to-cyan-600 text-white font-semibold rounded-lg hover:shadow-xl transition transform hover:-translate-y-1"
                    >
                        Masuk
                    </button>
                </form>

                <div class="mt-6 text-center">
                    <p class="text-gray-600">
                        Belum punya akun?
                        <a href="{{ url('/register') }}" class="text-teal-600 hover:text-teal-700 font-semibold">
                            Daftar di sini
                        </a>
                    </p>
                </div>

                <!-- Demo Login Info -->
                <div class="mt-6 p-4 bg-cyan-50 rounded-lg border border-cyan-200">
                    <p class="text-sm text-gray-700 mb-2 font-semibold">Demo Login:</p>
                    <div class="space-y-1">
                        <p class="text-sm text-gray-600">
                            <span class="font-medium">Admin:</span> admin@aquavie.com / admin123
                        </p>
                        <p class="text-sm text-gray-600">
                            <span class="font-medium">User:</span> user@example.com / password
                        </p>
                    </div>
                </div>
            </div>

            <div class="mt-6 text-center">
                <a href="{{ url('/') }}" class="text-teal-600 hover:text-teal-700 font-semibold">
                    ← Kembali ke Home
                </a>
            </div>
        </div>
    </div>
</body>
</html>