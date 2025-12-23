<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Monitoring Global - AquaVie Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <div class="flex h-screen bg-gradient-to-br from-gray-50 to-gray-100">
        @include('layouts.admin-sidebar')
        
        <div class="flex-1 flex flex-col overflow-hidden">
            @include('layouts.admin-topbar', ['pageTitle' => 'Monitoring Global'])
            
            <div class="flex-1 overflow-y-auto p-8">
                <div class="flex items-center justify-between mb-6">
                    <h1 class="text-3xl font-bold text-gray-800">Monitoring Global</h1>
                    <button class="flex items-center gap-2 px-4 py-2 bg-white text-gray-700 rounded-lg hover:bg-gray-50 transition shadow-md font-medium">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z"></path>
                        </svg>
                        Filter
                    </button>
                </div>

                <!-- Global Chart -->
                <div class="bg-white rounded-2xl p-6 shadow-lg mb-6">
                    <h2 class="text-xl font-semibold mb-4 text-gray-800">Rata-rata Kualitas Air Global</h2>
                    <div style="height: 280px;">
                        <canvas id="globalChart"></canvas>
                    </div>
                </div>

                <!-- Kolam Table -->
                <div class="bg-white rounded-2xl shadow-lg overflow-hidden">
                    <div class="p-6 border-b border-gray-200">
                        <h2 class="text-xl font-semibold text-gray-800">Status Kolam Real-Time</h2>
                    </div>
                    <div class="overflow-x-auto">
                        <table class="w-full">
                            <thead class="bg-gray-100">
                                <tr>
                                    <th class="px-6 py-3 text-left text-sm text-gray-700 font-semibold">User</th>
                                    <th class="px-6 py-3 text-left text-sm text-gray-700 font-semibold">Kolam</th>
                                    <th class="px-6 py-3 text-left text-sm text-gray-700 font-semibold">Lokasi</th>
                                    <th class="px-6 py-3 text-left text-sm text-gray-700 font-semibold">pH</th>
                                    <th class="px-6 py-3 text-left text-sm text-gray-700 font-semibold">Suhu</th>
                                    <th class="px-6 py-3 text-left text-sm text-gray-700 font-semibold">TDS</th>
                                    <th class="px-6 py-3 text-left text-sm text-gray-700 font-semibold">EC</th>
                                    <th class="px-6 py-3 text-left text-sm text-gray-700 font-semibold">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($kolamData as $row)
                                <tr class="border-b border-gray-100 hover:bg-gray-50 transition">
                                    <td class="px-6 py-3 text-sm text-gray-700">{{ $row['user'] }}</td>
                                    <td class="px-6 py-3 text-sm text-gray-700 font-medium">{{ $row['kolam'] }}</td>
                                    <td class="px-6 py-3 text-sm text-gray-700">
                                        <div class="flex items-center gap-2">
                                            <svg class="w-4 h-4 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                            </svg>
                                            {{ $row['lokasi'] }}
                                        </div>
                                    </td>
                                    <td class="px-6 py-3 text-sm text-gray-700 font-medium">{{ $row['pH'] }}</td>
                                    <td class="px-6 py-3 text-sm text-gray-700 font-medium">{{ $row['suhu'] }}°C</td>
                                    <td class="px-6 py-3 text-sm text-gray-700 font-medium">{{ $row['TDS'] }}</td>
                                    <td class="px-6 py-3 text-sm text-gray-700 font-medium">{{ $row['EC'] }}</td>
                                    <td class="px-6 py-3">
                                        @php
                                        $statusColors = [
                                            'normal' => 'bg-green-100 text-green-700',
                                            'warning' => 'bg-yellow-100 text-yellow-700',
                                            'critical' => 'bg-red-100 text-red-700',
                                        ];
                                        @endphp
                                        <span class="px-3 py-1 rounded-full text-xs capitalize font-semibold {{ $statusColors[$row['status']] ?? 'bg-gray-100 text-gray-700' }}">
                                            {{ $row['status'] }}
                                        </span>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        const ctx = document.getElementById('globalChart').getContext('2d');
        new Chart(ctx, {
            type: 'line',
            data: {
                labels: ['00:00', '04:00', '08:00', '12:00', '16:00', '20:00'],
                datasets: [
                    {
                        label: 'Avg pH',
                        data: [7.1, 7.0, 7.2, 7.3, 7.1, 7.0],
                        borderColor: '#0891b2',
                        backgroundColor: 'rgba(8, 145, 178, 0.1)',
                        tension: 0.4,
                        borderWidth: 2,
                        fill: true
                    },
                    {
                        label: 'Avg Suhu (°C)',
                        data: [26, 25, 27, 29, 28, 26],
                        borderColor: '#f97316',
                        backgroundColor: 'rgba(249, 115, 22, 0.1)',
                        tension: 0.4,
                        borderWidth: 2,
                        fill: true
                    },
                    {
                        label: 'Avg TDS (ppm)',
                        data: [420, 410, 435, 450, 430, 415],
                        borderColor: '#8b5cf6',
                        backgroundColor: 'rgba(139, 92, 246, 0.1)',
                        tension: 0.4,
                        borderWidth: 2,
                        fill: true,
                        yAxisID: 'y1'
                    },
                    {
                        label: 'Avg EC (µS/cm)',
                        data: [680, 670, 695, 710, 690, 675],
                        borderColor: '#ec4899',
                        backgroundColor: 'rgba(236, 72, 153, 0.1)',
                        tension: 0.4,
                        borderWidth: 2,
                        fill: true,
                        yAxisID: 'y1'
                    }
                ]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                interaction: {
                    mode: 'index',
                    intersect: false,
                },
                plugins: { 
                    legend: { 
                        position: 'top',
                        labels: {
                            font: { size: 10 },
                            boxWidth: 12,
                            padding: 10
                        }
                    }
                },
                scales: {
                    y: {
                        type: 'linear',
                        display: true,
                        position: 'left',
                        title: {
                            display: true,
                            text: 'pH & Suhu',
                            font: { size: 10 }
                        },
                        ticks: {
                            font: { size: 9 }
                        }
                    },
                    y1: {
                        type: 'linear',
                        display: true,
                        position: 'right',
                        title: {
                            display: true,
                            text: 'TDS & EC',
                            font: { size: 10 }
                        },
                        ticks: {
                            font: { size: 9 }
                        },
                        grid: {
                            drawOnChartArea: false,
                        }
                    },
                    x: {
                        ticks: {
                            font: { size: 9 }
                        }
                    }
                }
            }
        });
    </script>
</body>
</html>