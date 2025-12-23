@extends('layouts.app')

@section('title', 'Riwayat & Analisis - AquaVie')

@section('content')
<div class="flex h-screen bg-gradient-to-br from-gray-50 to-cyan-50">
    @include('layouts.sidebar')
    
    <div class="flex-1 flex flex-col overflow-hidden">
        @include('layouts.topbar', ['pageTitle' => 'Riwayat & Analisis Data'])
        
        <div class="flex-1 overflow-y-auto p-8">
            <div class="flex items-center justify-between mb-8">
                <h1 class="text-3xl font-bold text-gray-800">Riwayat & Analisis Data</h1>
                <div class="flex gap-3">
                    <button onclick="toggleFilter()" class="flex items-center gap-2 px-4 py-2 bg-white text-gray-700 rounded-lg hover:bg-gray-50 transition shadow-md font-semibold">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z"></path>
                        </svg>
                        Filter
                    </button>
                    <a href="{{ route('riwayat.export', ['format' => 'pdf']) }}" class="flex items-center gap-2 px-4 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700 transition shadow-md font-semibold">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path>
                        </svg>
                        PDF
                    </a>
                    <a href="{{ route('riwayat.export', ['format' => 'excel']) }}" class="flex items-center gap-2 px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700 transition shadow-md font-semibold">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path>
                        </svg>
                        Excel
                    </a>
                </div>
            </div>

            <!-- Filter Panel -->
            <div id="filterPanel" class="hidden bg-white rounded-2xl p-6 shadow-lg mb-8">
                <h2 class="text-xl font-semibold mb-4 text-gray-800">Filter Data</h2>
                <form action="{{ route('riwayat.index') }}" method="GET" class="grid md:grid-cols-3 gap-4">
                    <div>
                        <label class="block text-gray-700 font-medium mb-2">Periode</label>
                        <select name="periode" class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:border-teal-500 focus:ring-2 focus:ring-teal-200 transition">
                            <option value="all">Semua Data</option>
                            <option value="today">Hari Ini</option>
                            <option value="week">Minggu Ini</option>
                            <option value="month">Bulan Ini</option>
                            <option value="year">Tahun Ini</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-gray-700 font-medium mb-2">Kolam</label>
                        <select name="kolam" class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:border-teal-500 focus:ring-2 focus:ring-teal-200 transition">
                            <option value="all">Semua Kolam</option>
                            <option value="a">Kolam A</option>
                            <option value="b">Kolam B</option>
                            <option value="c">Kolam C</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-gray-700 font-medium mb-2">Source</label>
                        <select name="source" class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:border-teal-500 focus:ring-2 focus:ring-teal-200 transition">
                            <option value="all">Semua Source</option>
                            <option value="manual">Manual</option>
                            <option value="sensor">Sensor</option>
                        </select>
                    </div>
                    <div class="md:col-span-3">
                        <button type="submit" class="px-6 py-2 bg-gradient-to-r from-teal-600 to-cyan-600 text-white rounded-lg hover:shadow-lg transition font-semibold">
                            Terapkan Filter
                        </button>
                    </div>
                </form>
            </div>

            <!-- Chart -->
            <div class="bg-white rounded-2xl p-6 shadow-lg mb-8">
                <h2 class="text-xl font-semibold mb-6 text-gray-800">Grafik Analisis</h2>
                <canvas id="analysisChart" height="100"></canvas>
            </div>

            <!-- Table -->
            <div class="bg-white rounded-2xl shadow-lg overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead class="bg-gradient-to-r from-teal-600 to-cyan-600 text-white">
                            <tr>
                                <th class="px-6 py-4 text-left font-semibold">Tanggal</th>
                                <th class="px-6 py-4 text-left font-semibold">Jam</th>
                                <th class="px-6 py-4 text-left font-semibold">Kolam</th>
                                <th class="px-6 py-4 text-left font-semibold">Lokasi</th>
                                <th class="px-6 py-4 text-left font-semibold">pH</th>
                                <th class="px-6 py-4 text-left font-semibold">Suhu</th>
                                <th class="px-6 py-4 text-left font-semibold">TDS</th>
                                <th class="px-6 py-4 text-left font-semibold">EC</th>
                                <th class="px-6 py-4 text-left font-semibold">Source</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($data ?? [] as $index => $row)
                            <tr class="border-b border-gray-100 hover:bg-gray-50 transition {{ $index % 2 === 0 ? 'bg-white' : 'bg-gray-50' }}">
                                <td class="px-6 py-4 text-gray-700">{{ $row->tanggal }}</td>
                                <td class="px-6 py-4 text-gray-700">{{ $row->jam }}</td>
                                <td class="px-6 py-4 text-gray-700">{{ $row->kolam }}</td>
                                <td class="px-6 py-4 text-gray-700">{{ $row->lokasi }}</td>
                                <td class="px-6 py-4 text-gray-700">{{ $row->pH }}</td>
                                <td class="px-6 py-4 text-gray-700">{{ $row->suhu }}°C</td>
                                <td class="px-6 py-4 text-gray-700">{{ $row->TDS }}</td>
                                <td class="px-6 py-4 text-gray-700">{{ $row->EC }}</td>
                                <td class="px-6 py-4">
                                    <span class="px-3 py-1 rounded-full text-xs font-semibold {{ $row->source === 'Manual' ? 'bg-blue-100 text-blue-700' : 'bg-purple-100 text-purple-700' }}">
                                        {{ $row->source }}
                                    </span>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="9" class="px-6 py-8 text-center text-gray-500">
                                    Belum ada data yang tersedia
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
function toggleFilter() {
    const filterPanel = document.getElementById('filterPanel');
    filterPanel.classList.toggle('hidden');
}

// Chart.js Implementation
const ctx = document.getElementById('analysisChart').getContext('2d');
const analysisChart = new Chart(ctx, {
    type: 'line',
    data: {
        labels: ['15 Des', '16 Des', '17 Des', '18 Des', '19 Des', '20 Des'],
        datasets: [
            {
                label: 'pH',
                data: [7.0, 7.2, 6.9, 7.1, 7.3, 7.2],
                borderColor: '#0891b2',
                backgroundColor: 'rgba(8, 145, 178, 0.1)',
                tension: 0.4,
                borderWidth: 2
            },
            {
                label: 'Suhu',
                data: [26, 27, 28, 27, 26, 27],
                borderColor: '#f97316',
                backgroundColor: 'rgba(249, 115, 22, 0.1)',
                tension: 0.4,
                borderWidth: 2
            },
            {
                label: 'TDS',
                data: [410, 420, 430, 425, 415, 420],
                borderColor: '#14b8a6',
                backgroundColor: 'rgba(20, 184, 166, 0.1)',
                tension: 0.4,
                borderWidth: 2
            },
            {
                label: 'EC',
                data: [625, 635, 650, 640, 630, 635],
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
</script>
@endpush