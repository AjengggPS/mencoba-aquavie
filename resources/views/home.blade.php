@extends('layouts.landing')

@section('title', 'Home - Smart Water Quality Monitoring')

@section('content')
<!-- Hero Section -->
<section class="relative py-20 md:py-32 overflow-hidden">
    <!-- Decorative Background Blobs -->
    <div class="absolute inset-0 overflow-hidden pointer-events-none">
        <div class="absolute w-96 h-96 bg-cyan-500 rounded-full mix-blend-multiply filter blur-3xl opacity-10 -top-48 -left-48 animate-blob"></div>
        <div class="absolute w-96 h-96 bg-teal-500 rounded-full mix-blend-multiply filter blur-3xl opacity-10 top-1/2 right-0 animate-blob animation-delay-2000"></div>
        <div class="absolute w-96 h-96 bg-blue-500 rounded-full mix-blend-multiply filter blur-3xl opacity-10 -bottom-48 left-1/2 animate-blob animation-delay-4000"></div>
    </div>

    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <!-- Badge -->
        <div class="inline-flex items-center space-x-2 bg-cyan-500/10 backdrop-blur-sm border border-cyan-400/30 text-cyan-300 px-6 py-3 rounded-full text-sm font-medium mb-8 transform hover:scale-105 transition duration-300">
            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                <path d="M12 2.69l5.66 5.66a8 8 0 1 1-11.31 0L12 2.69z"/>
            </svg>
            <span>Smart Water Quality Monitoring</span>
        </div>

        <!-- Main Heading -->
        <h1 class="text-5xl md:text-7xl font-bold text-white mb-6 tracking-tight">
            Aqua<span class="text-transparent bg-clip-text bg-gradient-to-r from-cyan-400 to-blue-500">Vie</span>
        </h1>

        <!-- Subheading -->
        <p class="text-2xl md:text-3xl text-gray-200 mb-4 font-light">
            Smart Monitoring for Fish Pond Water Quality
        </p>

        <!-- Description -->
        <p class="text-lg md:text-xl text-gray-300 max-w-3xl mx-auto mb-12 leading-relaxed">
            Membantu pembudidaya ikan air tawar mencatat, memantau, dan menganalisis kondisi air kolam secara digital
        </p>

        <!-- CTA Buttons -->
        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <a href="{{ route('register') }}" class="inline-flex items-center justify-center bg-gradient-to-r from-cyan-400 to-blue-500 text-white px-10 py-4 rounded-xl text-lg font-semibold hover:from-cyan-500 hover:to-blue-600 transform hover:scale-105 transition duration-300 shadow-2xl hover:shadow-cyan-500/50">
                <span>Get Started</span>
                <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/>
                </svg>
            </a>
            <a href="/about" class="inline-flex items-center justify-center bg-white/10 backdrop-blur-sm border-2 border-white/20 text-white px-10 py-4 rounded-xl text-lg font-semibold hover:bg-white/20 transition duration-300">
                <span>Learn More</span>
            </a>
        </div>
    </div>
</section>

<!-- Features Section -->
<section class="py-20 relative">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-4xl md:text-5xl font-bold text-white mb-4">Fitur Unggulan</h2>
            <p class="text-xl text-gray-300">Solusi lengkap untuk monitoring kualitas air kolam Anda</p>
        </div>

        <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8">
            <!-- Feature 1 -->
            <div class="group bg-teal-800/50 backdrop-blur-sm border border-teal-700/50 rounded-2xl p-8 hover:bg-teal-800/70 hover:-translate-y-2 transition-all duration-300 cursor-pointer">
                <div class="w-16 h-16 bg-gradient-to-br from-cyan-400 to-blue-500 rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition duration-300 shadow-lg group-hover:shadow-cyan-500/50">
                    <svg class="w-8 h-8 text-white" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M12 2.69l5.66 5.66a8 8 0 1 1-11.31 0L12 2.69z"/>
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-white mb-3">Monitoring Kualitas Air</h3>
                <p class="text-gray-300 leading-relaxed">Pantau pH, suhu, TDS, dan EC kolam Anda secara real-time dengan visualisasi yang mudah dipahami</p>
            </div>

            <!-- Feature 2 -->
            <div class="group bg-teal-800/50 backdrop-blur-sm border border-teal-700/50 rounded-2xl p-8 hover:bg-teal-800/70 hover:-translate-y-2 transition-all duration-300 cursor-pointer">
                <div class="w-16 h-16 bg-gradient-to-br from-cyan-400 to-blue-500 rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition duration-300 shadow-lg group-hover:shadow-cyan-500/50">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"/>
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-white mb-3">Analisis Otomatis</h3>
                <p class="text-gray-300 leading-relaxed">Dapatkan insight dan rekomendasi otomatis berdasarkan data kualitas air kolam Anda</p>
            </div>

            <!-- Feature 3 -->
            <div class="group bg-teal-800/50 backdrop-blur-sm border border-teal-700/50 rounded-2xl p-8 hover:bg-teal-800/70 hover:-translate-y-2 transition-all duration-300 cursor-pointer">
                <div class="w-16 h-16 bg-gradient-to-br from-cyan-400 to-blue-500 rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition duration-300 shadow-lg group-hover:shadow-cyan-500/50">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/>
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-white mb-3">Grafik Riwayat Data</h3>
                <p class="text-gray-300 leading-relaxed">Lihat tren kualitas air dalam bentuk grafik harian, mingguan, hingga tahunan</p>
            </div>

            <!-- Feature 4 -->
            <div class="group bg-teal-800/50 backdrop-blur-sm border border-teal-700/50 rounded-2xl p-8 hover:bg-teal-800/70 hover:-translate-y-2 transition-all duration-300 cursor-pointer">
                <div class="w-16 h-16 bg-gradient-to-br from-cyan-400 to-blue-500 rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition duration-300 shadow-lg group-hover:shadow-cyan-500/50">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-white mb-3">Dashboard Admin</h3>
                <p class="text-gray-300 leading-relaxed">Kelola pengguna, perangkat, dan monitoring global dengan dashboard admin yang lengkap</p>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="py-20">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="relative bg-gradient-to-br from-teal-800/60 to-cyan-800/60 backdrop-blur-lg border border-cyan-700/50 rounded-3xl p-12 shadow-2xl overflow-hidden">
            <!-- Decorative Elements -->
            <div class="absolute top-0 right-0 w-64 h-64 bg-cyan-500 rounded-full filter blur-3xl opacity-10"></div>
            <div class="absolute bottom-0 left-0 w-64 h-64 bg-blue-500 rounded-full filter blur-3xl opacity-10"></div>
            
            <div class="relative text-center">
                <h2 class="text-4xl font-bold text-white mb-6">Siap Memulai?</h2>
                <p class="text-xl text-gray-200 mb-8 leading-relaxed">
                    Bergabunglah dengan AquaVie dan mulai monitoring kualitas air kolam Anda secara profesional
                </p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <a href="{{ route('register') }}" class="inline-flex items-center justify-center bg-gradient-to-r from-cyan-400 to-blue-500 text-white px-8 py-4 rounded-xl text-lg font-semibold hover:from-cyan-500 hover:to-blue-600 transform hover:scale-105 transition duration-300 shadow-xl hover:shadow-cyan-500/50">
                        <span>Daftar Sekarang</span>
                        <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/>
                        </svg>
                    </a>
                    <a href="/about" class="inline-flex items-center justify-center bg-white/10 backdrop-blur-sm border-2 border-white/20 text-white px-8 py-4 rounded-xl text-lg font-semibold hover:bg-white/20 transition duration-300">
                        Pelajari Lebih Lanjut
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Custom CSS untuk animasi blob -->
<style>
@keyframes blob {
    0%, 100% { transform: translate(0, 0) scale(1); }
    25% { transform: translate(20px, -50px) scale(1.1); }
    50% { transform: translate(-20px, 20px) scale(0.9); }
    75% { transform: translate(50px, 50px) scale(1.05); }
}

.animate-blob {
    animation: blob 7s infinite;
}

.animation-delay-2000 {
    animation-delay: 2s;
}

.animation-delay-4000 {
    animation-delay: 4s;
}
</style>
@endsection