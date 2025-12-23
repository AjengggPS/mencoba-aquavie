<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - AquaVie</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <div class="flex h-screen bg-gradient-to-br from-gray-50 to-gray-100">
        <!-- Sidebar -->
        @include('layouts.admin-sidebar')
        
        <div class="flex-1 flex flex-col overflow-hidden">
            <!-- Topbar -->
            @include('layouts.admin-topbar', ['pageTitle' => 'Dashboard Overview'])
            
            <div class="flex-1 overflow-y-auto p-8">
                <h1 class="text-3xl font-bold mb-8 text-gray-800">Dashboard Overview</h1>

                <!-- Stats Cards -->
                <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                    @foreach($stats as $stat)
                    <div class="bg-white rounded-2xl p-6 shadow-lg hover:shadow-xl transition">
                        <div class="flex items-start justify-between mb-4">
                            <div class="w-12 h-12 bg-gradient-to-br {{ $stat['color'] }} rounded-xl flex items-center justify-center shadow-md">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path>
                                </svg>
                            </div>
                            <span class="text-sm text-green-600 flex items-center gap-1 font-medium">
                                {{ $stat['change'] }}
                            </span>
                        </div>
                        <h3 class="text-gray-600 mb-1 font-medium">{{ $stat['label'] }}</h3>
                        <p class="text-3xl font-bold text-gray-800">{{ $stat['value'] }}</p>
                    </div>
                    @endforeach
                </div>

                <div class="grid lg:grid-cols-2 gap-6 mb-8">
                    <!-- Device Status Pie Chart -->
                    <div class="bg-white rounded-2xl p-6 shadow-lg">
                        <h2 class="text-xl font-semibold mb-4 text-gray-800">Status Device</h2>
                        <div class="flex justify-center items-center" style="height: 280px;">
                            <canvas id="deviceChart"></canvas>
                        </div>
                    </div>

                    <!-- Water Quality Bar Chart -->
                    <div class="bg-white rounded-2xl p-6 shadow-lg">
                        <h2 class="text-xl font-semibold mb-4 text-gray-800">Kondisi Kualitas Air Global</h2>
                        <div style="height: 280px;">
                            <canvas id="waterQualityChart"></canvas>
                        </div>
                    </div>
                </div>

                <!-- System Insights -->
                <div class="bg-gradient-to-r from-teal-50 to-cyan-50 rounded-2xl p-6 shadow-lg border border-teal-200 mb-8">
                    <h2 class="text-xl font-semibold mb-4 text-teal-800 flex items-center gap-2">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        System Insights
                    </h2>
                    <div class="space-y-3">
                        @foreach($insights as $insight)
                        <div class="flex items-start gap-3">
                            <div class="w-2 h-2 bg-{{ $insight['color'] }}-500 rounded-full mt-2"></div>
                            <p class="text-gray-700">{{ $insight['text'] }}</p>
                        </div>
                        @endforeach
                    </div>
                </div>

                <!-- Last Update -->
                <div class="bg-white rounded-2xl p-6 shadow-lg">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-gray-600 font-medium">Last System Update</p>
                            <p class="text-gray-800 text-lg font-semibold">{{ now()->format('d F Y, H:i') }} WIB</p>
                        </div>
                        <div class="px-4 py-2 bg-green-100 rounded-lg">
                            <p class="text-sm text-green-700 font-semibold">System Normal</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Device Status Pie Chart
        const deviceCtx = document.getElementById('deviceChart').getContext('2d');
        new Chart(deviceCtx, {
            type: 'pie',
            data: {
                labels: ['Aktif', 'Offline', 'Error'],
                datasets: [{
                    data: [45, 8, 3],
                    backgroundColor: ['#10b981', '#ef4444', '#f59e0b'],
                    borderWidth: 2,
                    borderColor: '#fff'
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: true,
                plugins: {
                    legend: {
                        position: 'bottom',
                        labels: { 
                            padding: 15, 
                            font: { size: 11 },
                            boxWidth: 12
                        }
                    }
                }
            }
        });

        // Water Quality Bar Chart
        const waterCtx = document.getElementById('waterQualityChart').getContext('2d');
        new Chart(waterCtx, {
            type: 'bar',
            data: {
                labels: ['pH Normal', 'pH Warning', 'Suhu Normal', 'Suhu Warning', 'TDS Normal', 'TDS Warning', 'EC Normal', 'EC Warning'],
                datasets: [{
                    label: 'Jumlah',
                    data: [120, 15, 110, 25, 105, 30, 100, 35],
                    backgroundColor: [
                        '#14b8a6', '#f59e0b', 
                        '#14b8a6', '#f59e0b',
                        '#14b8a6', '#f59e0b',
                        '#14b8a6', '#f59e0b'
                    ],
                    borderRadius: 8
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false
                    }
                },
                scales: {
                    y: { 
                        beginAtZero: true,
                        ticks: {
                            font: { size: 10 }
                        }
                    },
                    x: {
                        ticks: {
                            font: { size: 9 },
                            maxRotation: 45,
                            minRotation: 45
                        }
                    }
                }
            }
        });
    </script>
</body>
</html>