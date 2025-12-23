<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Kolam - AquaVie Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
    <div class="flex h-screen bg-gradient-to-br from-gray-50 to-gray-100">
        @include('layouts.admin-sidebar')
        
        <div class="flex-1 flex flex-col overflow-hidden">
            @include('layouts.admin-topbar', ['pageTitle' => 'Data Kolam'])
            
            <div class="flex-1 overflow-y-auto p-8">
                <h1 class="text-3xl font-bold mb-8 text-gray-800">Data Kolam</h1>

                <!-- Search -->
                <div class="bg-white rounded-2xl p-6 shadow-lg mb-8">
                    <div class="relative">
                        <svg class="absolute left-4 top-1/2 transform -translate-y-1/2 w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                        <input
                            type="text"
                            class="w-full pl-12 pr-4 py-3 rounded-lg border border-gray-300 focus:border-teal-500 focus:ring-2 focus:ring-teal-200 transition"
                            placeholder="Cari kolam, user, atau lokasi..."
                        />
                    </div>
                </div>

                <!-- Stats -->
                <div class="grid md:grid-cols-4 gap-6 mb-8">
                    <div class="bg-white rounded-2xl p-6 shadow-lg hover:shadow-xl transition">
                        <div class="flex items-start justify-between mb-3">
                            <div class="w-12 h-12 bg-gradient-to-br from-teal-500 to-teal-600 rounded-xl flex items-center justify-center shadow-md">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 7v10c0 2.21 3.582 4 8 4s8-1.79 8-4V7M4 7c0 2.21 3.582 4 8 4s8-1.79 8-4M4 7c0-2.21 3.582-4 8-4s8 1.79 8 4m0 5c0 2.21-3.582 4-8 4s-8-1.79-8-4"></path>
                                </svg>
                            </div>
                        </div>
                        <p class="text-gray-600 mb-2 font-medium">Total Kolam</p>
                        <p class="text-3xl font-bold text-gray-800">{{ $stats['totalKolam'] }}</p>
                    </div>
                    <div class="bg-white rounded-2xl p-6 shadow-lg hover:shadow-xl transition">
                        <div class="flex items-start justify-between mb-3">
                            <div class="w-12 h-12 bg-gradient-to-br from-green-500 to-green-600 rounded-xl flex items-center justify-center shadow-md">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                                </svg>
                            </div>
                        </div>
                        <p class="text-gray-600 mb-2 font-medium">Aktif Hari Ini</p>
                        <p class="text-3xl font-bold text-teal-600">{{ $stats['aktifHariIni'] }}</p>
                    </div>
                    <div class="bg-white rounded-2xl p-6 shadow-lg hover:shadow-xl transition">
                        <div class="flex items-start justify-between mb-3">
                            <div class="w-12 h-12 bg-gradient-to-br from-blue-500 to-blue-600 rounded-xl flex items-center justify-center shadow-md">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                </svg>
                            </div>
                        </div>
                        <p class="text-gray-600 mb-2 font-medium">Total Data</p>
                        <p class="text-3xl font-bold text-gray-800">{{ $stats['totalData'] }}</p>
                    </div>
                    <div class="bg-white rounded-2xl p-6 shadow-lg hover:shadow-xl transition">
                        <div class="flex items-start justify-between mb-3">
                            <div class="w-12 h-12 bg-gradient-to-br from-purple-500 to-purple-600 rounded-xl flex items-center justify-center shadow-md">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path>
                                </svg>
                            </div>
                        </div>
                        <p class="text-gray-600 mb-2 font-medium">Avg Data/Kolam</p>
                        <p class="text-3xl font-bold text-gray-800">{{ $stats['avgDataPerKolam'] }}</p>
                    </div>
                </div>

                <!-- Table -->
                <div class="bg-white rounded-2xl shadow-lg overflow-hidden">
                    <div class="overflow-x-auto">
                        <table class="w-full">
                            <thead class="bg-gradient-to-r from-teal-600 to-cyan-600 text-white">
                                <tr>
                                    <th class="px-6 py-4 text-left font-semibold">User</th>
                                    <th class="px-6 py-4 text-left font-semibold">Nama Kolam</th>
                                    <th class="px-6 py-4 text-left font-semibold">Lokasi</th>
                                    <th class="px-6 py-4 text-left font-semibold">Total Data</th>
                                    <th class="px-6 py-4 text-left font-semibold">Last Update</th>
                                    <th class="px-6 py-4 text-left font-semibold">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($kolamData as $index => $row)
                                <tr class="border-b border-gray-100 hover:bg-gray-50 transition {{ $index % 2 === 0 ? 'bg-white' : 'bg-gray-50' }}">
                                    <td class="px-6 py-4 text-gray-700">{{ $row['user'] }}</td>
                                    <td class="px-6 py-4 text-gray-700 font-semibold">{{ $row['namaKolam'] }}</td>
                                    <td class="px-6 py-4 text-gray-700">{{ $row['lokasi'] }}</td>
                                    <td class="px-6 py-4 text-gray-700 font-medium">{{ $row['totalData'] }}</td>
                                    <td class="px-6 py-4 text-gray-700">{{ $row['lastUpdate'] }}</td>
                                    <td class="px-6 py-4">
                                        <div class="flex gap-2">
                                            <button class="p-2 text-teal-600 hover:bg-teal-50 rounded-lg transition" title="View">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                                </svg>
                                            </button>
                                            <button class="p-2 text-red-600 hover:bg-red-50 rounded-lg transition" title="Delete">
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