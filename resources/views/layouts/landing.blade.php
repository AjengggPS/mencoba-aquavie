<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'AquaVie') }} - @yield('title', 'Smart Water Quality Monitoring')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="antialiased bg-gradient-to-br from-teal-900 via-cyan-900 to-blue-900 min-h-screen">
    
    <!-- Navbar -->
    <nav class="bg-teal-800/80 backdrop-blur-md border-b border-teal-700/50 sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-20">
                
                <!-- Logo & Brand -->
                <a href="/" class="flex items-center space-x-3 group">
                    <div class="w-12 h-12 bg-gradient-to-br from-cyan-400 to-blue-500 rounded-xl flex items-center justify-center transform group-hover:scale-110 transition duration-300 shadow-lg">
                        <svg class="w-7 h-7 text-white" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 2.69l5.66 5.66a8 8 0 1 1-11.31 0L12 2.69z"/>
                        </svg>
                    </div>
                    <span class="text-2xl font-bold text-white">AquaVie</span>
                </a>

                <!-- Desktop Menu -->
                <div class="hidden md:flex items-center space-x-8">
                    <a href="/" class="text-white hover:text-cyan-300 transition font-medium {{ request()->is('/') ? 'text-cyan-300' : '' }}">
                        Home
                    </a>
                    <a href="/about" class="text-white hover:text-cyan-300 transition font-medium {{ request()->is('about') ? 'text-cyan-300' : '' }}">
                        About Us
                    </a>
                    <a href="/contact" class="text-white hover:text-cyan-300 transition font-medium {{ request()->is('contact') ? 'text-cyan-300' : '' }}">
                        Contact Us
                    </a>
                    
                    @auth
                        <a href="{{ route('dashboard') }}" class="bg-gradient-to-r from-cyan-400 to-blue-500 text-white px-6 py-2.5 rounded-lg font-semibold hover:from-cyan-500 hover:to-blue-600 transform hover:scale-105 transition duration-300 shadow-lg">
                            Dashboard
                        </a>
                    @else
                        <a href="{{ route('login') }}" class="bg-gradient-to-r from-cyan-400 to-blue-500 text-white px-6 py-2.5 rounded-lg font-semibold hover:from-cyan-500 hover:to-blue-600 transform hover:scale-105 transition duration-300 shadow-lg">
                            Login
                        </a>
                    @endauth
                </div>

                <!-- Mobile Menu Button -->
                <button id="mobile-menu-btn" class="md:hidden text-white">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                    </svg>
                </button>
            </div>

            <!-- Mobile Menu -->
            <div id="mobile-menu" class="hidden md:hidden pb-4">
                <div class="flex flex-col space-y-3">
                    <a href="/" class="text-white hover:text-cyan-300 transition">Home</a>
                    <a href="/about" class="text-white hover:text-cyan-300 transition">About Us</a>
                    <a href="/contact" class="text-white hover:text-cyan-300 transition">Contact Us</a>
                    @auth
                        <a href="{{ route('dashboard') }}" class="text-white hover:text-cyan-300 transition">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="text-white hover:text-cyan-300 transition">Login</a>
                    @endauth
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main>
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-teal-900/80 backdrop-blur-sm border-t border-teal-800/50 mt-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
            <div class="grid md:grid-cols-3 gap-8">
                
                <!-- Column 1: Brand -->
                <div>
                    <div class="flex items-center space-x-3 mb-4">
                        <div class="w-10 h-10 bg-gradient-to-br from-cyan-400 to-blue-500 rounded-lg flex items-center justify-center">
                            <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12 2.69l5.66 5.66a8 8 0 1 1-11.31 0L12 2.69z"/>
                            </svg>
                        </div>
                        <span class="text-xl font-bold text-white">AquaVie</span>
                    </div>
                    <p class="text-gray-300 text-sm">
                        Platform monitoring kualitas air tambak ikan air tawar yang membantu pembudidaya secara digital.
                    </p>
                </div>

                <!-- Column 2: Links -->
                <div>
                    <h3 class="text-white font-bold mb-4">Quick Links</h3>
                    <ul class="space-y-2 text-gray-300 text-sm">
                        <li><a href="/" class="hover:text-cyan-300 transition">Home</a></li>
                        <li><a href="/about" class="hover:text-cyan-300 transition">About Us</a></li>
                        <li><a href="/contact" class="hover:text-cyan-300 transition">Contact Us</a></li>
                        <li><a href="{{ route('login') }}" class="hover:text-cyan-300 transition">Login</a></li>
                    </ul>
                </div>

                <!-- Column 3: Contact -->
                <div>
                    <h3 class="text-white font-bold mb-4">Contact</h3>
                    <ul class="space-y-2 text-gray-300 text-sm">
                        <li>Email: support@aquavie.id</li>
                        <li>Phone: +62 812-3456-7890</li>
                        <li>Telkom University Jakarta</li>
                    </ul>
                </div>
            </div>

            <div class="border-t border-teal-800/50 mt-8 pt-8 text-center text-gray-400 text-sm">
                <p>&copy; 2024 AquaVie - Kelompok 2 Tugas Besar Pemrograman Web. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <!-- Mobile Menu Toggle Script -->
    <script>
        document.getElementById('mobile-menu-btn').addEventListener('click', function() {
            const menu = document.getElementById('mobile-menu');
            menu.classList.toggle('hidden');
        });
    </script>
</body>
</html>