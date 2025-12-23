<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Device Management - AquaVie</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
    <div class="flex h-screen bg-gradient-to-br from-gray-50 to-gray-100">
        <!-- Sidebar -->
        @include('layouts.admin-sidebar')
        
        <div class="flex-1 flex flex-col overflow-hidden">
            <!-- Topbar -->
            @include('layouts.admin-topbar', ['pageTitle' => 'Device Management'])
            
            <div class="flex-1 overflow-y-auto p-8">
                <h1 class="text-3xl font-bold mb-8 text-gray-800">Device Management</h1>

                <!-- Stats -->
                <div class="grid md:grid-cols-4 gap-6 mb-8">
                    <div class="bg-white rounded-2xl p-6 shadow-lg">
                        <div class="flex items-start justify-between mb-3">
                            <div class="w-12 h-12 bg-gradient-to-br from-blue-500 to-blue-600 rounded-xl flex items-center justify-center shadow-md">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14M5 12a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v4a2 2 0 01-2 2M5 12a2 2 0 00-2 2v4a2 2 0 002 2h14a2 2 0 002-2v-4a2 2 0 00-2-2m-2-4h.01M17 16h.01"></path>
                                </svg>
                            </div>
                        </div>
                        <p class="text-gray-600 mb-2">Total Devices</p>
                        <p class="text-3xl font-bold text-gray-800">56</p>
                    </div>
                    <div class="bg-white rounded-2xl p-6 shadow-lg">
                        <div class="flex items-start justify-between mb-3">
                            <div class="w-12 h-12 bg-gradient-to-br from-green-500 to-green-600 rounded-xl flex items-center justify-center shadow-md">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </div>
                        </div>
                        <p class="text-gray-600 mb-2">Active</p>
                        <p class="text-3xl font-bold text-green-600">45</p>
                    </div>
                    <div class="bg-white rounded-2xl p-6 shadow-lg">
                        <div class="flex items-start justify-between mb-3">
                            <div class="w-12 h-12 bg-gradient-to-br from-gray-500 to-gray-600 rounded-xl flex items-center justify-center shadow-md">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 5.636a9 9 0 010 12.728m0 0l-2.829-2.829m2.829 2.829L21 21M15.536 8.464a5 5 0 010 7.072m0 0l-2.829-2.829m-4.243 2.829a4.978 4.978 0 01-1.414-2.83m-1.414 5.658a9 9 0 01-2.167-9.238m7.824 2.167a1 1 0 111.414 1.414m-1.414-1.414L3 3m8.293 8.293l1.414 1.414"></path>
                                </svg>
                            </div>
                        </div>
                        <p class="text-gray-600 mb-2">Offline</p>
                        <p class="text-3xl font-bold text-gray-600">8</p>
                    </div>
                    <div class="bg-white rounded-2xl p-6 shadow-lg">
                        <div class="flex items-start justify-between mb-3">
                            <div class="w-12 h-12 bg-gradient-to-br from-red-500 to-red-600 rounded-xl flex items-center justify-center shadow-md">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </div>
                        </div>
                        <p class="text-gray-600 mb-2">Error</p>
                        <p class="text-3xl font-bold text-red-600">3</p>
                    </div>
                </div>

                <!-- Table -->
                <div class="bg-white rounded-2xl shadow-lg overflow-hidden">
                    <div class="overflow-x-auto">
                        <table class="w-full">
                            <thead class="bg-gradient-to-r from-teal-600 to-cyan-600 text-white">
                                <tr>
                                    <th class="px-6 py-4 text-left">Device ID</th>
                                    <th class="px-6 py-4 text-left">User</th>
                                    <th class="px-6 py-4 text-left">Kolam</th>
                                    <th class="px-6 py-4 text-left">Lokasi</th>
                                    <th class="px-6 py-4 text-left">Status</th>
                                    <th class="px-6 py-4 text-left">Last Sync</th>
                                    <th class="px-6 py-4 text-left">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                $devices = [
                                    ['id' => 1, 'deviceId' => 'AQV-2024-001', 'user' => 'user@example.com', 'kolam' => 'Kolam A', 'lokasi' => 'Tangerang', 'status' => 'active', 'lastSync' => '2 min ago'],
                                    ['id' => 2, 'deviceId' => 'AQV-2024-002', 'user' => 'budidaya@mail.com', 'kolam' => 'Kolam B', 'lokasi' => 'Jakarta', 'status' => 'offline', 'lastSync' => '2 hours ago'],
                                    ['id' => 3, 'deviceId' => 'AQV-2024-003', 'user' => 'tambak@mail.com', 'kolam' => 'Kolam Premium', 'lokasi' => 'Bogor', 'status' => 'active', 'lastSync' => '5 min ago'],
                                    ['id' => 4, 'deviceId' => 'AQV-2024-004', 'user' => 'user@example.com', 'kolam' => 'Kolam C', 'lokasi' => 'Tangerang', 'status' => 'error', 'lastSync' => '1 day ago'],
                                ];
                                @endphp
                                @foreach($devices as $index => $device)
                                <tr class="border-b border-gray-100 hover:bg-gray-50 transition {{ $index % 2 === 0 ? 'bg-white' : 'bg-gray-50' }}">
                                    <td class="px-6 py-4 text-gray-700">{{ $device['deviceId'] }}</td>
                                    <td class="px-6 py-4 text-gray-700">{{ $device['user'] }}</td>
                                    <td class="px-6 py-4 text-gray-700">{{ $device['kolam'] }}</td>
                                    <td class="px-6 py-4 text-gray-700">{{ $device['lokasi'] }}</td>
                                    <td class="px-6 py-4">
                                        <div class="flex items-center gap-2">
                                            <span class="w-2 h-2 rounded-full 
                                                @if($device['status'] === 'active') bg-green-500
                                                @elseif($device['status'] === 'offline') bg-gray-500
                                                @else bg-red-500
                                                @endif">
                                            </span>
                                            <span class="text-gray-700 capitalize">
                                                @if($device['status'] === 'active') Active
                                                @elseif($device['status'] === 'offline') Offline
                                                @else Error
                                                @endif
                                            </span>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 text-gray-700">{{ $device['lastSync'] }}</td>
                                    <td class="px-6 py-4">
                                        <div class="flex gap-2">
                                            <button class="p-2 text-teal-600 hover:bg-teal-50 rounded-lg transition">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                                </svg>
                                            </button>
                                            <button class="p-2 text-red-600 hover:bg-red-50 rounded-lg transition">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                                </svg>
                                            </button>
                                        </div>
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
</body>
</html>