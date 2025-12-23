<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Device Issues - AquaVie</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
    <div class="flex h-screen bg-gradient-to-br from-gray-50 to-gray-100">
        <!-- Sidebar -->
        @include('layouts.admin-sidebar')
        
        <div class="flex-1 flex flex-col overflow-hidden">
            <!-- Topbar -->
            @include('layouts.admin-topbar', ['pageTitle' => 'Device Issues'])
            
            <div class="flex-1 overflow-y-auto p-8">
                <h1 class="text-3xl font-bold mb-8 text-gray-800">Device Issues</h1>

                <!-- Filter -->
                <div class="bg-white rounded-2xl p-6 shadow-lg mb-8">
                    <div class="flex gap-4">
                        <a href="?status=all" class="px-4 py-2 rounded-lg transition {{ request('status', 'all') === 'all' ? 'bg-gradient-to-r from-teal-600 to-cyan-600 text-white' : 'bg-gray-100 text-gray-700 hover:bg-gray-200' }}">
                            All Issues
                        </a>
                        <a href="?status=pending" class="px-4 py-2 rounded-lg transition {{ request('status') === 'pending' ? 'bg-gradient-to-r from-teal-600 to-cyan-600 text-white' : 'bg-gray-100 text-gray-700 hover:bg-gray-200' }}">
                            Pending
                        </a>
                        <a href="?status=in-progress" class="px-4 py-2 rounded-lg transition {{ request('status') === 'in-progress' ? 'bg-gradient-to-r from-teal-600 to-cyan-600 text-white' : 'bg-gray-100 text-gray-700 hover:bg-gray-200' }}">
                            In Progress
                        </a>
                        <a href="?status=resolved" class="px-4 py-2 rounded-lg transition {{ request('status') === 'resolved' ? 'bg-gradient-to-r from-teal-600 to-cyan-600 text-white' : 'bg-gray-100 text-gray-700 hover:bg-gray-200' }}">
                            Resolved
                        </a>
                    </div>
                </div>

                <!-- Stats -->
                <div class="grid md:grid-cols-4 gap-6 mb-8">
                    <div class="bg-white rounded-2xl p-6 shadow-lg">
                        <div class="flex items-start justify-between mb-3">
                            <div class="w-12 h-12 bg-gradient-to-br from-gray-500 to-gray-600 rounded-xl flex items-center justify-center shadow-md">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4"></path>
                                </svg>
                            </div>
                        </div>
                        <p class="text-gray-600 mb-2">Total Issues</p>
                        <p class="text-3xl font-bold text-gray-800">48</p>
                    </div>
                    <div class="bg-white rounded-2xl p-6 shadow-lg">
                        <div class="flex items-start justify-between mb-3">
                            <div class="w-12 h-12 bg-gradient-to-br from-yellow-500 to-yellow-600 rounded-xl flex items-center justify-center shadow-md">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </div>
                        </div>
                        <p class="text-gray-600 mb-2">Pending</p>
                        <p class="text-3xl font-bold text-yellow-600">12</p>
                    </div>
                    <div class="bg-white rounded-2xl p-6 shadow-lg">
                        <div class="flex items-start justify-between mb-3">
                            <div class="w-12 h-12 bg-gradient-to-br from-blue-500 to-blue-600 rounded-xl flex items-center justify-center shadow-md">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path>
                                </svg>
                            </div>
                        </div>
                        <p class="text-gray-600 mb-2">In Progress</p>
                        <p class="text-3xl font-bold text-blue-600">8</p>
                    </div>
                    <div class="bg-white rounded-2xl p-6 shadow-lg">
                        <div class="flex items-start justify-between mb-3">
                            <div class="w-12 h-12 bg-gradient-to-br from-green-500 to-green-600 rounded-xl flex items-center justify-center shadow-md">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </div>
                        </div>
                        <p class="text-gray-600 mb-2">Resolved</p>
                        <p class="text-3xl font-bold text-green-600">28</p>
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
                                    <th class="px-6 py-4 text-left">Type</th>
                                    <th class="px-6 py-4 text-left">Priority</th>
                                    <th class="px-6 py-4 text-left">Status</th>
                                    <th class="px-6 py-4 text-left">Date</th>
                                    <th class="px-6 py-4 text-left">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                $issues = [
                                    ['id' => 1, 'deviceId' => 'AQV-2024-001', 'user' => 'user@example.com', 'type' => 'Sensor Tidak Akurat', 'status' => 'pending', 'date' => '20 Des 2025', 'priority' => 'high'],
                                    ['id' => 2, 'deviceId' => 'AQV-2024-004', 'user' => 'tambak@mail.com', 'type' => 'Device Offline', 'status' => 'in-progress', 'date' => '19 Des 2025', 'priority' => 'urgent'],
                                    ['id' => 3, 'deviceId' => 'AQV-2024-002', 'user' => 'budidaya@mail.com', 'type' => 'Masalah Koneksi', 'status' => 'resolved', 'date' => '18 Des 2025', 'priority' => 'medium'],
                                    ['id' => 4, 'deviceId' => 'AQV-2024-007', 'user' => 'pembudidaya@mail.com', 'type' => 'Kerusakan Hardware', 'status' => 'pending', 'date' => '20 Des 2025', 'priority' => 'urgent'],
                                ];
                                @endphp
                                @foreach($issues as $index => $issue)
                                <tr class="border-b border-gray-100 hover:bg-gray-50 transition {{ $index % 2 === 0 ? 'bg-white' : 'bg-gray-50' }}">
                                    <td class="px-6 py-4 text-gray-700">{{ $issue['deviceId'] }}</td>
                                    <td class="px-6 py-4 text-gray-700">{{ $issue['user'] }}</td>
                                    <td class="px-6 py-4 text-gray-700">{{ $issue['type'] }}</td>
                                    <td class="px-6 py-4">
                                        <span class="px-3 py-1 rounded-full text-xs capitalize font-medium
                                            @if($issue['priority'] === 'urgent') bg-red-100 text-red-700
                                            @elseif($issue['priority'] === 'high') bg-orange-100 text-orange-700
                                            @elseif($issue['priority'] === 'medium') bg-yellow-100 text-yellow-700
                                            @else bg-gray-100 text-gray-700
                                            @endif">
                                            {{ $issue['priority'] }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="flex items-center gap-2 px-3 py-1 rounded-full text-xs capitalize w-fit font-medium
                                            @if($issue['status'] === 'pending') bg-yellow-100 text-yellow-700
                                            @elseif($issue['status'] === 'in-progress') bg-blue-100 text-blue-700
                                            @else bg-green-100 text-green-700
                                            @endif">
                                            @if($issue['status'] === 'pending')
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                            </svg>
                                            @elseif($issue['status'] === 'in-progress')
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                            </svg>
                                            @else
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                            </svg>
                                            @endif
                                            {{ str_replace('-', ' ', $issue['status']) }}
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 text-gray-700">{{ $issue['date'] }}</td>
                                    <td class="px-6 py-4">
                                        <button class="px-4 py-2 bg-teal-600 text-white rounded-lg hover:bg-teal-700 transition text-sm font-medium">
                                            View Details
                                        </button>
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