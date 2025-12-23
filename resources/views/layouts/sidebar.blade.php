<aside id="sidebar" class="bg-white w-64 shadow-xl flex flex-col transition-all duration-300">
    <!-- Logo -->
    <div class="p-6 border-b border-gray-200">
        <div class="flex items-center gap-3">
            <div class="w-10 h-10 bg-gradient-to-br from-teal-400 to-cyan-500 rounded-lg flex items-center justify-center">
                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21a4 4 0 01-4-4V5a2 2 0 012-2h4a2 2 0 012 2v12a4 4 0 01-4 4zm0 0h12a2 2 0 002-2v-4a2 2 0 00-2-2h-2.343M11 7.343l1.657-1.657a2 2 0 012.828 0l2.829 2.829a2 2 0 010 2.828l-8.486 8.485M7 17h.01"></path>
                </svg>
            </div>
            <div>
                <h1 class="text-xl font-bold text-gray-800">AquaVie</h1>
                <p class="text-xs text-gray-500">Water Monitor</p>
            </div>
        </div>
    </div>

    <!-- Navigation Menu -->
    <nav class="flex-1 p-4 overflow-y-auto">
        <ul class="space-y-2">
            <!-- Dashboard -->
            <li>
                <a href="{{ route('dashboard') }}" class="flex items-center gap-3 px-4 py-3 rounded-lg {{ request()->routeIs('dashboard') ? 'bg-gradient-to-r from-teal-500 to-cyan-500 text-white' : 'text-gray-700 hover:bg-gray-100' }} transition">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                    </svg>
                    <span class="font-medium">Dashboard</span>
                </a>
            </li>

            <!-- Input Data -->
            <li>
                <a href="{{ route('input-data') }}" class="flex items-center gap-3 px-4 py-3 rounded-lg {{ request()->routeIs('input-data') ? 'bg-gradient-to-r from-teal-500 to-cyan-500 text-white' : 'text-gray-700 hover:bg-gray-100' }} transition">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                    </svg>
                    <span class="font-medium">Input Data</span>
                </a>
            </li>

            <!-- Riwayat & Analisis -->
            <li>
                <a href="{{ route('riwayat') }}" class="flex items-center gap-3 px-4 py-3 rounded-lg {{ request()->routeIs('riwayat') ? 'bg-gradient-to-r from-teal-500 to-cyan-500 text-white' : 'text-gray-700 hover:bg-gray-100' }} transition">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                    </svg>
                    <span class="font-medium">Riwayat & Analisis</span>
                </a>
            </li>

            <!-- Feedback & Support -->
            <li>
                <a href="{{ route('feedback') }}" class="flex items-center gap-3 px-4 py-3 rounded-lg {{ request()->routeIs('feedback') ? 'bg-gradient-to-r from-teal-500 to-cyan-500 text-white' : 'text-gray-700 hover:bg-gray-100' }} transition">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"></path>
                    </svg>
                    <span class="font-medium">Feedback & Support</span>
                </a>
            </li>

            <!-- Shop AquaVie -->
            <li>
                <a href="{{ route('shop') }}" class="flex items-center gap-3 px-4 py-3 rounded-lg {{ request()->routeIs('shop') ? 'bg-gradient-to-r from-teal-500 to-cyan-500 text-white' : 'text-gray-700 hover:bg-gray-100' }} transition">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path>
                    </svg>
                    <span class="font-medium">Shop AquaVie</span>
                </a>
            </li>
        </ul>
    </nav>

    <!-- Footer/User Section -->
    <div class="p-4 border-t border-gray-200">
        <div class="flex items-center gap-3 px-3 py-2 bg-gradient-to-r from-teal-50 to-cyan-50 rounded-lg">
            <div class="w-8 h-8 bg-gradient-to-br from-teal-400 to-cyan-500 rounded-full flex items-center justify-center">
                <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                </svg>
            </div>
            <div class="flex-1">
                <p class="text-sm font-medium text-gray-800">Pembudidaya</p>
                <p class="text-xs text-gray-600">Online</p>
            </div>
        </div>
    </div>
</aside>