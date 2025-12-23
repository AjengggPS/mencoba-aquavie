<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AquaVie - Smart Water Quality Monitoring</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-br from-cyan-50 via-blue-50 to-teal-50">
    <!-- Navbar -->
    <nav class="bg-gradient-to-r from-teal-700 via-cyan-700 to-blue-700 shadow-lg sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-6 py-4">
            <div class="flex items-center justify-between">
                <!-- Logo -->
                <a href="{{ url('/') }}" class="flex items-center gap-3">
                    <div class="w-10 h-10 bg-cyan-400 rounded-xl flex items-center justify-center shadow-lg">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21a4 4 0 01-4-4V5a2 2 0 012-2h4a2 2 0 012 2v12a4 4 0 01-4 4zm0 0h12a2 2 0 002-2v-4a2 2 0 00-2-2h-2.343M11 7.343l1.657-1.657a2 2 0 012.828 0l2.829 2.829a2 2 0 010 2.828l-8.486 8.485M7 17h.01"></path>
                        </svg>
                    </div>
                    <span class="text-white text-2xl font-bold">AquaVie</span>
                </a>
                
                <!-- Menu Navigation -->
                <div class="flex items-center gap-8">
                    <a href="{{ url('/') }}" class="text-white hover:text-cyan-200 transition font-medium">Home</a>
                    <a href="{{ url('/about') }}" class="text-white hover:text-cyan-200 transition font-medium">About Us</a>
                    <a href="{{ url('/contact') }}" class="text-white hover:text-cyan-200 transition font-medium">Contact</a>
                    <a href="{{ url('/login') }}" class="px-6 py-2 bg-cyan-400 text-white rounded-lg hover:bg-cyan-500 transition shadow-lg font-semibold">
                        Login
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="py-20 px-6">
        <div class="max-w-7xl mx-auto">
            <div class="grid lg:grid-cols-2 gap-12 items-center">
                <div>
                    <h1 class="text-6xl font-bold mb-6 leading-tight">
                        <span class="bg-gradient-to-r from-teal-600 to-cyan-600 bg-clip-text text-transparent">
                            Smart Water Quality
                        </span>
                        <br />
                        <span class="text-gray-800">Monitoring System</span>
                    </h1>
                    <p class="text-xl text-gray-600 mb-8 leading-relaxed">
                        Pantau kualitas air tambak secara real-time dengan teknologi IoT. 
                        Tingkatkan produktivitas dan efisiensi budidaya ikan Anda.
                    </p>
                    <div class="flex gap-4">
                        <a href="{{ url('/register') }}" class="px-8 py-4 bg-gradient-to-r from-teal-600 to-cyan-600 text-white rounded-lg hover:shadow-xl transition transform hover:-translate-y-1 font-semibold text-lg">
                            Mulai Gratis
                        </a>
                        <a href="{{ url('/learn-more') }}" class="px-8 py-4 bg-white text-teal-600 rounded-lg hover:shadow-xl transition border-2 border-teal-600 font-semibold text-lg">
                            Pelajari Lebih Lanjut
                        </a>
                    </div>
                </div>
                <div class="relative">
                    <div class="bg-gradient-to-br from-teal-400 to-cyan-500 rounded-3xl p-8 shadow-2xl">
                        <img src="https://images.unsplash.com/photo-1535591273668-578e31182c4f?w=600&q=80" 
                             alt="Fish Farm" 
                             class="rounded-2xl shadow-lg w-full h-96 object-cover">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section class="py-20 px-6 bg-white">
        <div class="max-w-7xl mx-auto">
            <h2 class="text-4xl font-bold text-center mb-16">
                <span class="bg-gradient-to-r from-teal-600 to-cyan-600 bg-clip-text text-transparent">
                    Fitur Unggulan
                </span>
            </h2>
            <div class="grid md:grid-cols-3 gap-8">
                <div class="bg-gradient-to-br from-teal-50 to-cyan-50 rounded-2xl p-8 hover:shadow-xl transition">
                    <div class="w-16 h-16 bg-gradient-to-br from-teal-500 to-cyan-600 rounded-xl flex items-center justify-center mb-6 shadow-lg">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-semibold mb-4 text-gray-800">Real-time Monitoring</h3>
                    <p class="text-gray-600">
                        Pantau parameter kualitas air (pH, suhu, TDS, EC) secara real-time dari mana saja.
                    </p>
                </div>

                <div class="bg-gradient-to-br from-cyan-50 to-blue-50 rounded-2xl p-8 hover:shadow-xl transition">
                    <div class="w-16 h-16 bg-gradient-to-br from-cyan-500 to-blue-600 rounded-xl flex items-center justify-center mb-6 shadow-lg">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"></path>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-semibold mb-4 text-gray-800">Alert Otomatis</h3>
                    <p class="text-gray-600">
                        Terima notifikasi instant saat parameter air mencapai level kritis.
                    </p>
                </div>

                <div class="bg-gradient-to-br from-blue-50 to-teal-50 rounded-2xl p-8 hover:shadow-xl transition">
                    <div class="w-16 h-16 bg-gradient-to-br from-blue-500 to-teal-600 rounded-xl flex items-center justify-center mb-6 shadow-lg">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-semibold mb-4 text-gray-800">Laporan Analisis</h3>
                    <p class="text-gray-600">
                        Dapatkan insight dan rekomendasi berbasis data untuk meningkatkan hasil panen.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="py-20 px-6">
        <div class="max-w-4xl mx-auto text-center">
            <div class="bg-gradient-to-r from-teal-600 to-cyan-600 rounded-3xl p-12 shadow-2xl">
                <h2 class="text-4xl font-bold text-white mb-6">
                    Siap Meningkatkan Produktivitas Tambak Anda?
                </h2>
                <p class="text-xl text-white/90 mb-8">
                    Bergabunglah dengan ratusan pembudidaya ikan yang sudah merasakan manfaatnya
                </p>
                <a href="{{ url('/register') }}" class="inline-block px-10 py-4 bg-white text-teal-600 rounded-lg hover:shadow-2xl transition transform hover:-translate-y-1 font-semibold text-lg">
                    Daftar Sekarang - Gratis!
                </a>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-gradient-to-r from-teal-800 to-cyan-800 text-white py-12">
        <div class="max-w-7xl mx-auto px-6">
            <div class="grid md:grid-cols-3 gap-8 mb-8">
                <div>
                    <h3 class="text-xl font-bold mb-4">AquaVie</h3>
                    <p class="text-cyan-200">Smart Water Quality Monitoring untuk Tambak Anda</p>
                </div>
                <div>
                    <h4 class="font-semibold mb-4">Quick Links</h4>
                    <ul class="space-y-2">
                        <li><a href="{{ url('/') }}" class="text-cyan-200 hover:text-white transition">Home</a></li>
                        <li><a href="{{ url('/about') }}" class="text-cyan-200 hover:text-white transition">About Us</a></li>
                        <li><a href="{{ url('/contact') }}" class="text-cyan-200 hover:text-white transition">Contact</a></li>
                        <li><a href="{{ url('/learn-more') }}" class="text-cyan-200 hover:text-white transition">Learn More</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="font-semibold mb-4">Contact Info</h4>
                    <ul class="space-y-2 text-cyan-200">
                        <li>Email: info@aquavie.com</li>
                        <li>Phone: +62 812 3456 7890</li>
                        <li>Jakarta, Indonesia</li>
                    </ul>
                </div>
            </div>
            <div class="border-t border-cyan-700 pt-8 text-center">
                <p>&copy; 2025 AquaVie. All rights reserved.</p>
                <p class="text-cyan-200 mt-2">Kelompok 2 - Teknologi Informasi, Telkom University Jakarta</p>
            </div>
        </div>
    </footer>
</body>
</html>