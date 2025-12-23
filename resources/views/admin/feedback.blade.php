<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feedback Management - AquaVie</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
    <div class="flex h-screen bg-gradient-to-br from-gray-50 to-gray-100">
        <!-- Sidebar -->
        @include('layouts.admin-sidebar')
        
        <div class="flex-1 flex flex-col overflow-hidden">
            <!-- Topbar -->
            @include('layouts.admin-topbar', ['pageTitle' => 'Feedback Management'])
            
            <div class="flex-1 overflow-y-auto p-8">
                <h1 class="text-3xl font-bold mb-8 text-gray-800">Feedback Management</h1>

                <!-- Stats -->
                <div class="grid md:grid-cols-4 gap-6 mb-8">
                    <div class="bg-white rounded-2xl p-6 shadow-lg">
                        <div class="flex items-start justify-between mb-3">
                            <div class="w-12 h-12 bg-gradient-to-br from-teal-500 to-teal-600 rounded-xl flex items-center justify-center shadow-md">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path>
                                </svg>
                            </div>
                        </div>
                        <p class="text-gray-600 mb-2">Total Feedback</p>
                        <p class="text-3xl font-bold text-gray-800">156</p>
                    </div>
                    <div class="bg-white rounded-2xl p-6 shadow-lg">
                        <div class="flex items-start justify-between mb-3">
                            <div class="w-12 h-12 bg-gradient-to-br from-blue-500 to-blue-600 rounded-xl flex items-center justify-center shadow-md">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                                </svg>
                            </div>
                        </div>
                        <p class="text-gray-600 mb-2">New</p>
                        <p class="text-3xl font-bold text-blue-600">24</p>
                    </div>
                    <div class="bg-white rounded-2xl p-6 shadow-lg">
                        <div class="flex items-start justify-between mb-3">
                            <div class="w-12 h-12 bg-gradient-to-br from-yellow-500 to-yellow-600 rounded-xl flex items-center justify-center shadow-md">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                </svg>
                            </div>
                        </div>
                        <p class="text-gray-600 mb-2">Reviewed</p>
                        <p class="text-3xl font-bold text-yellow-600">45</p>
                    </div>
                    <div class="bg-white rounded-2xl p-6 shadow-lg">
                        <div class="flex items-start justify-between mb-3">
                            <div class="w-12 h-12 bg-gradient-to-br from-gray-500 to-gray-600 rounded-xl flex items-center justify-center shadow-md">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4"></path>
                                </svg>
                            </div>
                        </div>
                        <p class="text-gray-600 mb-2">Archived</p>
                        <p class="text-3xl font-bold text-gray-600">87</p>
                    </div>
                </div>

                <!-- Table -->
                <div class="bg-white rounded-2xl shadow-lg overflow-hidden">
                    <div class="overflow-x-auto">
                        <table class="w-full">
                            <thead class="bg-gradient-to-r from-teal-600 to-cyan-600 text-white">
                                <tr>
                                    <th class="px-6 py-4 text-left">User</th>
                                    <th class="px-6 py-4 text-left">Type</th>
                                    <th class="px-6 py-4 text-left">Message</th>
                                    <th class="px-6 py-4 text-left">Date</th>
                                    <th class="px-6 py-4 text-left">Status</th>
                                    <th class="px-6 py-4 text-left">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                $feedbacks = [
                                    ['id' => 1, 'user' => 'user@example.com', 'type' => 'Saran', 'message' => 'Tolong tambahkan fitur export ke CSV juga...', 'date' => '20 Des 2025', 'status' => 'new'],
                                    ['id' => 2, 'user' => 'budidaya@mail.com', 'type' => 'Kritik', 'message' => 'Dashboard loading agak lambat saat...', 'date' => '19 Des 2025', 'status' => 'reviewed'],
                                    ['id' => 3, 'user' => 'tambak@mail.com', 'type' => 'Pengalaman', 'message' => 'Sangat membantu dalam monitoring...', 'date' => '18 Des 2025', 'status' => 'archived'],
                                    ['id' => 4, 'user' => 'pembudidaya@mail.com', 'type' => 'Saran', 'message' => 'Bisa ditambahkan dark mode?', 'date' => '20 Des 2025', 'status' => 'new'],
                                ];
                                @endphp
                                @foreach($feedbacks as $index => $feedback)
                                <tr class="border-b border-gray-100 hover:bg-gray-50 transition {{ $index % 2 === 0 ? 'bg-white' : 'bg-gray-50' }}">
                                    <td class="px-6 py-4 text-gray-700">{{ $feedback['user'] }}</td>
                                    <td class="px-6 py-4">
                                        <span class="px-3 py-1 rounded-full text-xs
                                            @if($feedback['type'] === 'Saran') bg-green-100 text-green-700
                                            @elseif($feedback['type'] === 'Kritik') bg-red-100 text-red-700
                                            @else bg-purple-100 text-purple-700
                                            @endif">
                                            {{ $feedback['type'] }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 text-gray-700 max-w-xs truncate">{{ $feedback['message'] }}</td>
                                    <td class="px-6 py-4 text-gray-700">{{ $feedback['date'] }}</td>
                                    <td class="px-6 py-4">
                                        <span class="px-3 py-1 rounded-full text-xs capitalize
                                            @if($feedback['status'] === 'new') bg-blue-100 text-blue-700
                                            @elseif($feedback['status'] === 'reviewed') bg-yellow-100 text-yellow-700
                                            @else bg-gray-100 text-gray-700
                                            @endif">
                                            {{ $feedback['status'] }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="flex gap-2">
                                            <button class="p-2 text-teal-600 hover:bg-teal-50 rounded-lg transition">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
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