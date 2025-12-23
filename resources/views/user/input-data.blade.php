@extends('layouts.app')

@section('title', 'Input Data - AquaVie')

@section('content')
<div class="flex h-screen bg-gradient-to-br from-gray-50 to-cyan-50">
    @include('layouts.sidebar')
    
    <div class="flex-1 flex flex-col overflow-hidden">
        @include('layouts.topbar', ['pageTitle' => 'Input Data Kualitas Air'])
        
        <div class="flex-1 overflow-y-auto p-8">
            <h1 class="text-3xl font-bold mb-8 text-gray-800">Input Data Kualitas Air</h1>

            <div class="max-w-3xl mx-auto">
                <div class="bg-white rounded-2xl p-8 shadow-lg">
                    @if(session('success'))
                    <div class="mb-6 p-4 bg-green-100 border border-green-400 text-green-700 rounded-lg">
                        {{ session('success') }}
                    </div>
                    @endif

                    <form action="{{ route('input-data.store') }}" method="POST" class="space-y-6">
                        @csrf
                        
                        <div class="grid md:grid-cols-2 gap-6">
                            <div>
                                <label for="namaKolam" class="block text-gray-700 font-medium mb-2">Nama Kolam *</label>
                                <input
                                    type="text"
                                    id="namaKolam"
                                    name="nama_kolam"
                                    value="{{ old('nama_kolam') }}"
                                    class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:border-teal-500 focus:ring-2 focus:ring-teal-200 transition"
                                    placeholder="Contoh: Kolam A"
                                    required
                                />
                            </div>

                            <div>
                                <label for="lokasiKolam" class="block text-gray-700 font-medium mb-2">Lokasi Kolam</label>
                                <input
                                    type="text"
                                    id="lokasiKolam"
                                    name="lokasi_kolam"
                                    value="{{ old('lokasi_kolam') }}"
                                    class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:border-teal-500 focus:ring-2 focus:ring-teal-200 transition"
                                    placeholder="Contoh: Blok Utara"
                                />
                            </div>
                        </div>

                        <div class="grid md:grid-cols-2 gap-6">
                            <div>
                                <label for="pH" class="block text-gray-700 font-medium mb-2">pH *</label>
                                <input
                                    type="number"
                                    step="0.1"
                                    id="pH"
                                    name="ph"
                                    value="{{ old('ph') }}"
                                    class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:border-teal-500 focus:ring-2 focus:ring-teal-200 transition"
                                    placeholder="6.5 - 8.5"
                                    required
                                />
                            </div>

                            <div>
                                <label for="suhu" class="block text-gray-700 font-medium mb-2">Suhu (°C) *</label>
                                <input
                                    type="number"
                                    step="0.1"
                                    id="suhu"
                                    name="suhu"
                                    value="{{ old('suhu') }}"
                                    class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:border-teal-500 focus:ring-2 focus:ring-teal-200 transition"
                                    placeholder="25 - 30"
                                    required
                                />
                            </div>
                        </div>

                        <div class="grid md:grid-cols-2 gap-6">
                            <div>
                                <label for="TDS" class="block text-gray-700 font-medium mb-2">TDS (ppm) *</label>
                                <input
                                    type="number"
                                    id="TDS"
                                    name="tds"
                                    value="{{ old('tds') }}"
                                    class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:border-teal-500 focus:ring-2 focus:ring-teal-200 transition"
                                    placeholder="300 - 500"
                                    required
                                />
                            </div>

                            <div>
                                <label for="EC" class="block text-gray-700 font-medium mb-2">EC (μS/cm) *</label>
                                <input
                                    type="number"
                                    id="EC"
                                    name="ec"
                                    value="{{ old('ec') }}"
                                    class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:border-teal-500 focus:ring-2 focus:ring-teal-200 transition"
                                    placeholder="500 - 800"
                                    required
                                />
                            </div>
                        </div>

                        <div class="grid md:grid-cols-2 gap-6">
                            <div>
                                <label for="tanggal" class="block text-gray-700 font-medium mb-2">Tanggal *</label>
                                <input
                                    type="date"
                                    id="tanggal"
                                    name="tanggal"
                                    value="{{ old('tanggal', date('Y-m-d')) }}"
                                    class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:border-teal-500 focus:ring-2 focus:ring-teal-200 transition"
                                    required
                                />
                            </div>

                            <div>
                                <label for="jam" class="block text-gray-700 font-medium mb-2">Jam *</label>
                                <input
                                    type="time"
                                    id="jam"
                                    name="jam"
                                    value="{{ old('jam', date('H:i')) }}"
                                    class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:border-teal-500 focus:ring-2 focus:ring-teal-200 transition"
                                    required
                                />
                            </div>
                        </div>

                        <div>
                            <label for="catatan" class="block text-gray-700 font-medium mb-2">Catatan</label>
                            <textarea
                                id="catatan"
                                name="catatan"
                                rows="4"
                                class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:border-teal-500 focus:ring-2 focus:ring-teal-200 transition resize-none"
                                placeholder="Tambahkan catatan jika diperlukan..."
                            >{{ old('catatan') }}</textarea>
                        </div>

                        <button
                            type="submit"
                            class="w-full px-6 py-3 bg-gradient-to-r from-teal-600 to-cyan-600 text-white font-semibold rounded-lg hover:shadow-xl transition transform hover:-translate-y-1"
                        >
                            Simpan Data
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Insight Modal (akan muncul setelah submit berhasil dengan JavaScript) -->
<div id="insightModal" class="hidden fixed inset-0 bg-black/50 backdrop-blur-sm flex items-center justify-center z-50 p-6">
    <div class="bg-white rounded-3xl max-w-lg w-full shadow-2xl overflow-hidden">
        <div id="modalHeader" class="bg-gradient-to-r from-teal-600 to-cyan-600 p-8 text-center">
            <div class="flex justify-center mb-4">
                <svg class="w-16 h-16 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
            </div>
            <h2 class="text-3xl font-bold text-white" id="statusText">Aman</h2>
        </div>
        
        <div class="p-8">
            <h3 class="text-xl font-semibold mb-4 text-gray-800">Rekomendasi</h3>
            <ul id="recommendations" class="space-y-3 mb-6">
                <!-- Recommendations will be inserted here -->
            </ul>

            <div class="flex gap-3">
                <a href="{{ url('/dashboard') }}" class="flex-1 px-6 py-3 bg-gradient-to-r from-teal-600 to-cyan-600 text-white rounded-lg hover:shadow-lg transition text-center font-semibold">
                    Lihat Dashboard
                </a>
                <button onclick="closeModal()" class="flex-1 px-6 py-3 bg-gray-100 text-gray-700 rounded-lg hover:bg-gray-200 transition font-semibold">
                    Input Lagi
                </button>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
function closeModal() {
    document.getElementById('insightModal').classList.add('hidden');
}

@if(session('analysis'))
// Show modal with analysis results
document.addEventListener('DOMContentLoaded', function() {
    const analysis = @json(session('analysis'));
    showInsightModal(analysis);
});

function showInsightModal(analysis) {
    const modal = document.getElementById('insightModal');
    const header = document.getElementById('modalHeader');
    const statusText = document.getElementById('statusText');
    const recommendations = document.getElementById('recommendations');
    
    // Update header based on status
    statusText.textContent = analysis.status;
    
    if (analysis.status === 'aman') {
        header.className = 'bg-gradient-to-r from-green-500 to-emerald-600 p-8 text-center';
    } else if (analysis.status === 'peringatan') {
        header.className = 'bg-gradient-to-r from-yellow-500 to-orange-600 p-8 text-center';
    } else if (analysis.status === 'bahaya') {
        header.className = 'bg-gradient-to-r from-red-500 to-rose-600 p-8 text-center';
    }
    
    // Update recommendations
    recommendations.innerHTML = analysis.recommendations.map(rec => `
        <li class="flex items-start gap-3">
            <span class="text-teal-600">•</span>
            <span class="text-gray-700">${rec}</span>
        </li>
    `).join('');
    
    modal.classList.remove('hidden');
}
@endif
</script>
@endpush