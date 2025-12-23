<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>AquaVie</title>
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

{{-- Navbar --}}
<nav class="bg-white/10 backdrop-blur-md border-b border-white/10 fixed w-full top-0 z-50">
    <div class="max-w-7xl mx-auto px-4 h-16 flex justify-between items-center">
        <div class="flex items-center gap-2">
            <div class="w-10 h-10 bg-gradient-to-br from-cyan-400 to-blue-500 rounded-lg flex items-center justify-center">
                <i data-lucide="droplets"></i>
            </div>
            <span>AquaVie</span>
        </div>

        <div class="hidden md:flex gap-8 items-center">
            <a href="#home" class="hover:text-cyan-400">Home</a>
            <a href="{{ url('/about') }}" class="hover:text-cyan-400">About Us</a>
            <a href="#contact" class="hover:text-cyan-400">Contact</a>
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
            <a href="#home">Home</a>
            <a href="{{ url('/about') }}">About Us</a>
            <a href="#contact">Contact</a>
            <a href="{{ url('/login') }}"
               class="px-6 py-2 bg-gradient-to-r from-cyan-500 to-blue-500 rounded-lg text-center">
                Login
            </a>
        </div>
    </div>
</nav>

{{-- Hero --}}
<section id="home" class="pt-32 pb-20 px-4 text-center">
    <span class="inline-block mb-6 px-6 py-2 bg-white/10 rounded-full text-cyan-300">
        Smart Water Quality Monitoring
    </span>

    <h1 class="text-6xl font-bold bg-gradient-to-r from-cyan-400 to-blue-400 bg-clip-text text-transparent">
        AquaVie
    </h1>

    <p class="text-xl text-gray-200 mt-4">
        Smart Monitoring for Fish Pond Water Quality
    </p>

    <p class="text-gray-300 mt-6 max-w-2xl mx-auto">
        Membantu pembudidaya ikan memantau kualitas air kolam secara digital
    </p>

    <a href="{{ url('/learn-more') }}"
   class="inline-block mt-10 px-8 py-4 bg-gradient-to-r from-cyan-500 to-blue-500 rounded-xl">
    Learn More
</a>
</section>

{{-- Features --}}
<section class="py-20 px-4">
    <div class="max-w-7xl mx-auto grid md:grid-cols-4 gap-8">
        @php
            $features = [
                ['droplets','Monitoring Kualitas Air','Pantau pH, suhu, TDS, EC'],
                ['trending-up','Analisis Otomatis','Insight & rekomendasi otomatis'],
                ['bar-chart-3','Grafik Data','Grafik harian hingga tahunan'],
                ['shield-check','Dashboard Admin','Kelola pengguna & perangkat'],
            ];
        @endphp

        @foreach($features as $f)
        <div class="bg-white/5 p-8 rounded-2xl border border-white/10">
            <div class="w-16 h-16 bg-gradient-to-br from-cyan-400 to-blue-500 rounded-xl flex items-center justify-center mb-6">
                <i data-lucide="{{ $f[0] }}"></i>
            </div>
            <h3 class="text-xl mb-2">{{ $f[1] }}</h3>
            <p class="text-gray-300">{{ $f[2] }}</p>
        </div>
        @endforeach
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

    function sendMessage(e) {
        e.preventDefault();
        alert('Pesan berhasil dikirim!');
        e.target.reset();
    }
</script>

</body>
</html>