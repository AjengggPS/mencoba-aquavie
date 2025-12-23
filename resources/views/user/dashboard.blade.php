<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Dashboard - AquaVie</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <div class="flex h-screen bg-gradient-to-br from-gray-50 to-cyan-50">
        <!-- Sidebar -->
        @include('layouts.sidebar')
        
        <div class="flex-1 flex flex-col overflow-hidden">
            <!-- Topbar -->
            @include('layouts.topbar', ['pageTitle' => 'Dashboard'])
            
            <div class="flex-1 overflow-y-auto p-8">
                <h1 class="text-3xl font-bold mb-8 text-gray-800">Dashboard</h1>

                <!-- Water Quality Cards -->
                <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                    <!-- pH Card -->
                    <div class="bg-white rounded-2xl p-6 shadow-lg hover:shadow-xl transition">
                        <div class="flex items-start justify-between mb-4">
                            <div class="w-12 h-12 bg-gradient-to-br from-blue-400 to-cyan-500 rounded-xl flex items-center justify-center shadow-md">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21a4 4 0 01-4-4V5a2 2 0 012-2h4a2 2 0 012 2v12a4 4 0 01-4 4zm0 0h12a2 2 0 002-2v-4a2 2 0 00-2-2h-2.343M11 7.343l1.657-1.657a2 2 0 012.828 0l2.829 2.829a2 2 0 010 2.828l-8.486 8.485M7 17h.01"></path>
                                </svg>
                            </div>
                            <svg class="w-4 h-4 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path>
                            </svg>
                        </div>
                        <h3 class="text-gray-600 mb-2">pH</h3>
                        <p class="text-3xl font-bold mb-3 text-gray-800">7.2</p>
                        <span class="inline-block px-3 py-1 rounded-full text-xs border bg-green-100 text-green-700 border-green-300 font-semibold">
                            Normal
                        </span>
                    </div>

                    <!-- Suhu Card -->
                    <div class="bg-white rounded-2xl p-6 shadow-lg hover:shadow-xl transition">
                        <div class="flex items-start justify-between mb-4">
                            <div class="w-12 h-12 bg-gradient-to-br from-orange-400 to-red-500 rounded-xl flex items-center justify-center shadow-md">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                                </svg>
                            </div>
                            <svg class="w-4 h-4 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12H4"></path>
                            </svg>
                        </div>
                        <h3 class="text-gray-600 mb-2">Suhu</h3>
                        <p class="text-3xl font-bold mb-3 text-gray-800">27<span class="text-lg text-gray-500 ml-1">°C</span></p>
                        <span class="inline-block px-3 py-1 rounded-full text-xs border bg-green-100 text-green-700 border-green-300 font-semibold">
                            Normal
                        </span>
                    </div>

                    <!-- TDS Card -->
                    <div class="bg-white rounded-2xl p-6 shadow-lg hover:shadow-xl transition">
                        <div class="flex items-start justify-between mb-4">
                            <div class="w-12 h-12 bg-gradient-to-br from-teal-400 to-cyan-500 rounded-xl flex items-center justify-center shadow-md">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                                </svg>
                            </div>
                            <svg class="w-4 h-4 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 17h8m0 0V9m0 8l-8-8-4 4-6-6"></path>
                            </svg>
                        </div>
                        <h3 class="text-gray-600 mb-2">TDS</h3>
                        <p class="text-3xl font-bold mb-3 text-gray-800">415<span class="text-lg text-gray-500 ml-1">ppm</span></p>
                        <span class="inline-block px-3 py-1 rounded-full text-xs border bg-yellow-100 text-yellow-700 border-yellow-300 font-semibold">
                            Peringatan
                        </span>
                    </div>

                    <!-- EC Card -->
                    <div class="bg-white rounded-2xl p-6 shadow-lg hover:shadow-xl transition">
                        <div class="flex items-start justify-between mb-4">
                            <div class="w-12 h-12 bg-gradient-to-br from-purple-400 to-indigo-500 rounded-xl flex items-center justify-center shadow-md">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                                </svg>
                            </div>
                            <svg class="w-4 h-4 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path>
                            </svg>
                        </div>
                        <h3 class="text-gray-600 mb-2">EC</h3>
                        <p class="text-3xl font-bold mb-3 text-gray-800">635<span class="text-lg text-gray-500 ml-1">μS/cm</span></p>
                        <span class="inline-block px-3 py-1 rounded-full text-xs border bg-green-100 text-green-700 border-green-300 font-semibold">
                            Normal
                        </span>
                    </div>
                </div>

                <!-- Last Update Info -->
                <div class="bg-white rounded-2xl p-6 shadow-lg mb-8">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-gray-600">Last Update</p>
                            <p class="text-gray-800 text-lg font-semibold">20 Desember 2025, 18:00 WIB</p>
                        </div>
                        <div class="px-4 py-2 bg-gradient-to-r from-teal-50 to-cyan-50 rounded-lg border border-teal-200">
                            <p class="text-sm text-gray-600">Source Data</p>
                            <p class="text-teal-700 font-semibold">Manual Input</p>
                        </div>
                    </div>
                </div>

                <!-- Chart Section -->
                <div class="bg-white rounded-2xl p-6 shadow-lg mb-8">
                    <div class="flex items-center justify-between mb-6">
                        <h2 class="text-xl font-semibold text-gray-800">Grafik Kualitas Air</h2>
                        <div class="flex gap-2">
                            <button class="px-4 py-2 rounded-lg transition bg-gradient-to-r from-teal-600 to-cyan-600 text-white font-semibold" onclick="changeTimeRange('daily')">
                                Harian
                            </button>
                            <button class="px-4 py-2 rounded-lg transition bg-gray-100 text-gray-700 hover:bg-gray-200 font-semibold" onclick="changeTimeRange('weekly')">
                                Mingguan
                            </button>
                            <button class="px-4 py-2 rounded-lg transition bg-gray-100 text-gray-700 hover:bg-gray-200 font-semibold" onclick="changeTimeRange('yearly')">
                                Tahunan
                            </button>
                        </div>
                    </div>

                    <canvas id="waterQualityChart" height="100"></canvas>
                </div>

                <!-- Insights -->
                <div class="bg-gradient-to-r from-teal-50 to-cyan-50 rounded-2xl p-6 shadow-lg border border-teal-200">
                    <h2 class="text-xl font-semibold mb-4 text-teal-800">Insight & Rekomendasi</h2>
                    <div class="space-y-3">
                        <div class="flex items-start gap-3">
                            <div class="w-2 h-2 bg-green-500 rounded-full mt-2"></div>
                            <p class="text-gray-700">
                                Kondisi pH dan suhu dalam rentang optimal untuk pertumbuhan ikan air tawar.
                            </p>
                        </div>
                        <div class="flex items-start gap-3">
                            <div class="w-2 h-2 bg-yellow-500 rounded-full mt-2"></div>
                            <p class="text-gray-700">
                                Nilai TDS mengalami sedikit peningkatan. Pertimbangkan pergantian air sebagian jika terus meningkat.
                            </p>
                        </div>
                        <div class="flex items-start gap-3">
                            <div class="w-2 h-2 bg-blue-500 rounded-full mt-2"></div>
                            <p class="text-gray-700">
                                Monitoring rutin sangat baik. Lanjutkan pencatatan data untuk analisis jangka panjang.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
    // Chart.js Implementation
    const ctx = document.getElementById('waterQualityChart').getContext('2d');
    const waterQualityChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: ['08:00', '10:00', '12:00', '14:00', '16:00', '18:00'],
            datasets: [
                {
                    label: 'pH',
                    data: [7.2, 7.0, 6.8, 7.1, 7.3, 7.2],
                    borderColor: '#0891b2',
                    backgroundColor: 'rgba(8, 145, 178, 0.1)',
                    tension: 0.4,
                    borderWidth: 2
                },
                {
                    label: 'Suhu',
                    data: [26, 27, 28, 29, 28, 27],
                    borderColor: '#f97316',
                    backgroundColor: 'rgba(249, 115, 22, 0.1)',
                    tension: 0.4,
                    borderWidth: 2
                },
                {
                    label: 'TDS',
                    data: [420, 410, 430, 440, 425, 415],
                    borderColor: '#14b8a6',
                    backgroundColor: 'rgba(20, 184, 166, 0.1)',
                    tension: 0.4,
                    borderWidth: 2
                },
                {
                    label: 'EC',
                    data: [640, 630, 650, 660, 645, 635],
                    borderColor: '#8b5cf6',
                    backgroundColor: 'rgba(139, 92, 246, 0.1)',
                    tension: 0.4,
                    borderWidth: 2
                }
            ]
        },
        options: {
            responsive: true,
            maintainAspectRatio: true,
            plugins: {
                legend: {
                    position: 'top',
                }
            },
            scales: {
                y: {
                    beginAtZero: false
                }
            }
        }
    });

    function changeTimeRange(range) {
        console.log('Changing to: ' + range);
        // Update chart data here based on range
    }
    </script>
</body>
</html>