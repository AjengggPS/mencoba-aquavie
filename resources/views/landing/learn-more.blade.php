<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Learn More - AquaVie</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    {{-- Tailwind --}}
    <script src="https://cdn.tailwindcss.com"></script>

    {{-- Lucide Icons --}}
    <script src="https://unpkg.com/lucide@latest"></script>
</head>

<body class="min-h-screen bg-gradient-to-br from-teal-900 via-cyan-900 to-blue-900 text-white">

{{-- Background Blobs --}}
<div class="fixed inset-0 overflow-hidden pointer-events-none">
    <div class="absolute top-20 left-10 w-96 h-96 bg-cyan-500/20 rounded-full blur-3xl"></div>
    <div class="absolute bottom-20 right-10 w-96 h-96 bg-teal-500/20 rounded-full blur-3xl"></div>
    <div class="absolute top-1/2 left-1/2 w-96 h-96 bg-blue-500/20 rounded-full blur-3xl"></div>
</div>

{{-- Navbar (SAMA DENGAN LANDING) --}}
<nav class="bg-white/10 backdrop-blur-md border-b border-white/10 fixed w-full top-0 z-50">
    <div class="max-w-7xl mx-auto px-4 h-16 flex justify-between items-center">
        <div class="flex items-center gap-2">
            <div class="w-10 h-10 bg-gradient-to-br from-cyan-400 to-blue-500 rounded-lg flex items-center justify-center">
                <i data-lucide="droplets"></i>
            </div>
            <span>AquaVie</span>
        </div>

        <div class="hidden md:flex gap-8 items-center">
            <a href="{{ url('/') }}" class="hover:text-cyan-400">Home</a>
            <a href="{{ url('/about') }}" class="hover:text-cyan-400">About Us</a>
            <a href="{{ url('/contact') }}" class="hover:text-cyan-400">Contact</a>
            <a href="{{ url('/login') }}"
               class="px-6 py-2 bg-gradient-to-r from-cyan-500 to-blue-500 rounded-lg">
                Login
            </a>
        </div>

        <button onclick="toggleMenu()" class="md:hidden">
            <i data-lucide="menu"></i>
        </button>
    </div>

    {{-- Mobile Menu --}}
    <div id="mobileMenu" class="hidden md:hidden px-4 pb-4">
        <div class="flex flex-col gap-4">
            <a href="{{ url('/') }}">Home</a>
            <a href="{{ url('/about') }}">About Us</a>
            <a href="{{ url('/contact') }}">Contact</a>
            <a href="{{ url('/login') }}"
               class="px-6 py-2 bg-gradient-to-r from-cyan-500 to-blue-500 rounded-lg text-center">
                Login
            </a>
        </div>
    </div>
</nav>

{{-- CONTENT --}}
<section class="pt-32 pb-20 px-4">
    <div class="max-w-6xl mx-auto text-center">
        <span class="inline-block mb-6 px-6 py-2 bg-white/10 rounded-full text-cyan-300">
            Learn More About AquaVie
        </span>

        <h1 class="text-5xl font-bold bg-gradient-to-r from-cyan-400 to-blue-400 bg-clip-text text-transparent">
            Smart Water Quality Monitoring
        </h1>

        <p class="text-gray-200 mt-6 max-w-3xl mx-auto">
            AquaVie adalah platform berbasis web yang membantu pembudidaya ikan
            memantau dan menganalisis kualitas air kolam secara digital,
            cepat, dan akurat.
        </p>
    </div>

    {{-- Feature Detail --}}
    <div class="max-w-7xl mx-auto mt-20 grid md:grid-cols-2 gap-10">
        @php
            $details = [
                ['droplets','Monitoring Air','Pantau pH, suhu, TDS, dan EC secara real-time atau manual.'],
                ['trending-up','Analisis Otomatis','Sistem memberikan insight berdasarkan data yang terkumpul.'],
                ['bar-chart-3','Riwayat & Grafik','Visualisasi data harian, bulanan, hingga tahunan.'],
                ['shield-check','Manajemen Admin','Admin dapat mengelola pengguna, perangkat, dan data kolam.'],
            ];
        @endphp

        @foreach($details as $d)
        <div class="bg-white/5 p-8 rounded-2xl border border-white/10">
            <div class="w-14 h-14 bg-gradient-to-br from-cyan-400 to-blue-500 rounded-xl flex items-center justify-center mb-4">
                <i data-lucide="{{ $d[0] }}"></i>
            </div>
            <h3 class="text-xl mb-2">{{ $d[1] }}</h3>
            <p class="text-gray-300">{{ $d[2] }}</p>
        </div>
        @endforeach
    </div>

    {{-- CTA --}}
    <div class="text-center mt-20">
        <a href="{{ url('/register') }}"
           class="inline-block px-10 py-4 bg-gradient-to-r from-cyan-500 to-blue-500 rounded-xl text-lg">
            Mulai Sekarang
        </a>
    </div>
</section>

{{-- Footer --}}
<footer class="py-10 text-center text-gray-400">
    © 2024 AquaVie — Telkom University Jakarta
</footer>

<script>
    lucide.createIcons();

    function toggleMenu() {
        document.getElementById('mobileMenu').classList.toggle('hidden');
    }
</script>

</body>
</html>