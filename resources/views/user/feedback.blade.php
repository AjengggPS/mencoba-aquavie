@extends('layouts.app')

@section('title', 'Feedback & Support - AquaVie')

@section('content')
<div class="flex h-screen bg-gradient-to-br from-gray-50 to-cyan-50">
    @include('layouts.sidebar')
    
    <div class="flex-1 flex flex-col overflow-hidden">
        @include('layouts.topbar', ['pageTitle' => 'Feedback & Support'])
        
        <div class="flex-1 overflow-y-auto p-8">
            <h1 class="text-3xl font-bold mb-8 text-gray-800">Feedback & Support</h1>

            <!-- Tabs -->
            <div class="flex gap-4 mb-8">
                <button onclick="switchTab('feedback')" id="feedbackTab" class="tab-button flex items-center gap-2 px-6 py-3 rounded-lg transition bg-gradient-to-r from-teal-600 to-cyan-600 text-white shadow-lg font-semibold">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"></path>
                    </svg>
                    Feedback Umum
                </button>
                <button onclick="switchTab('device')" id="deviceTab" class="tab-button flex items-center gap-2 px-6 py-3 rounded-lg transition bg-white text-gray-700 hover:bg-gray-50 shadow-md font-semibold">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                    </svg>
                    Device Issue
                </button>
            </div>

            <div class="max-w-3xl">
                <!-- Feedback Tab -->
                <div id="feedbackContent" class="tab-content bg-white rounded-2xl p-8 shadow-lg">
                    <h2 class="text-2xl font-semibold mb-6 text-gray-800">Kirim Feedback</h2>
                    <p class="text-gray-600 mb-6">
                        Kami sangat menghargai feedback Anda untuk meningkatkan kualitas layanan AquaVie.
                    </p>

                    @if(session('success'))
                    <div class="mb-6 p-4 bg-green-100 border border-green-400 text-green-700 rounded-lg">
                        {{ session('success') }}
                    </div>
                    @endif

                    <form action="{{ route('feedback.store') }}" method="POST" class="space-y-6">
                        @csrf
                        <input type="hidden" name="type" value="general">
                        
                        <div>
                            <label for="feedbackType" class="block text-gray-700 font-medium mb-2">Jenis Feedback</label>
                            <select id="feedbackType" name="feedback_type" class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:border-teal-500 focus:ring-2 focus:ring-teal-200 transition">
                                <option value="saran">Saran</option>
                                <option value="kritik">Kritik</option>
                                <option value="pengalaman">Pengalaman Penggunaan</option>
                                <option value="lainnya">Lainnya</option>
                            </select>
                        </div>

                        <div>
                            <label for="message" class="block text-gray-700 font-medium mb-2">Pesan</label>
                            <textarea
                                id="message"
                                name="message"
                                rows="8"
                                class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:border-teal-500 focus:ring-2 focus:ring-teal-200 transition resize-none"
                                placeholder="Tuliskan feedback Anda di sini..."
                                required
                            ></textarea>
                        </div>

                        <button
                            type="submit"
                            class="w-full px-6 py-3 bg-gradient-to-r from-teal-600 to-cyan-600 text-white rounded-lg hover:shadow-xl transition transform hover:-translate-y-1 font-semibold"
                        >
                            Kirim Feedback
                        </button>
                    </form>
                </div>

                <!-- Device Issue Tab -->
                <div id="deviceContent" class="tab-content hidden bg-white rounded-2xl p-8 shadow-lg">
                    <h2 class="text-2xl font-semibold mb-6 text-gray-800">Laporkan Device Issue</h2>
                    <p class="text-gray-600 mb-6">
                        Gunakan form ini jika Anda mengalami masalah dengan perangkat AquaVie Anda.
                    </p>

                    <form action="{{ route('device-issue.store') }}" method="POST" class="space-y-6">
                        @csrf
                        
                        <div>
                            <label for="deviceId" class="block text-gray-700 font-medium mb-2">Device ID *</label>
                            <input
                                type="text"
                                id="deviceId"
                                name="device_id"
                                class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:border-teal-500 focus:ring-2 focus:ring-teal-200 transition"
                                placeholder="Contoh: AQV-2024-001"
                                required
                            />
                        </div>

                        <div>
                            <label for="lokasiKolam" class="block text-gray-700 font-medium mb-2">Lokasi Kolam *</label>
                            <input
                                type="text"
                                id="lokasiKolam"
                                name="lokasi_kolam"
                                class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:border-teal-500 focus:ring-2 focus:ring-teal-200 transition"
                                placeholder="Lokasi perangkat terpasang"
                                required
                            />
                        </div>

                        <div>
                            <label for="jenisError" class="block text-gray-700 font-medium mb-2">Jenis Error *</label>
                            <select
                                id="jenisError"
                                name="jenis_error"
                                class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:border-teal-500 focus:ring-2 focus:ring-teal-200 transition"
                                required
                            >
                                <option value="">Pilih jenis error</option>
                                <option value="koneksi">Masalah Koneksi</option>
                                <option value="sensor">Sensor Tidak Akurat</option>
                                <option value="offline">Device Offline</option>
                                <option value="hardware">Kerusakan Hardware</option>
                                <option value="lainnya">Lainnya</option>
                            </select>
                        </div>

                        <div>
                            <label for="deskripsi" class="block text-gray-700 font-medium mb-2">Deskripsi Masalah *</label>
                            <textarea
                                id="deskripsi"
                                name="deskripsi"
                                rows="6"
                                class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:border-teal-500 focus:ring-2 focus:ring-teal-200 transition resize-none"
                                placeholder="Jelaskan masalah yang Anda alami secara detail..."
                                required
                            ></textarea>
                        </div>

                        <div class="p-4 bg-yellow-50 border border-yellow-200 rounded-lg">
                            <p class="text-sm text-yellow-800">
                                <strong>Catatan:</strong> Tim teknis kami akan menghubungi Anda dalam 1x24 jam untuk menindaklanjuti laporan Anda.
                            </p>
                        </div>

                        <button
                            type="submit"
                            class="w-full px-6 py-3 bg-gradient-to-r from-teal-600 to-cyan-600 text-white rounded-lg hover:shadow-xl transition transform hover:-translate-y-1 font-semibold"
                        >
                            Kirim Laporan
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
function switchTab(tab) {
    // Hide all tab contents
    document.querySelectorAll('.tab-content').forEach(content => {
        content.classList.add('hidden');
    });
    
    // Reset all tab buttons
    document.querySelectorAll('.tab-button').forEach(button => {
        button.className = 'tab-button flex items-center gap-2 px-6 py-3 rounded-lg transition bg-white text-gray-700 hover:bg-gray-50 shadow-md font-semibold';
    });
    
    // Show selected tab content
    if (tab === 'feedback') {
        document.getElementById('feedbackContent').classList.remove('hidden');
        document.getElementById('feedbackTab').className = 'tab-button flex items-center gap-2 px-6 py-3 rounded-lg transition bg-gradient-to-r from-teal-600 to-cyan-600 text-white shadow-lg font-semibold';
    } else {
        document.getElementById('deviceContent').classList.remove('hidden');
        document.getElementById('deviceTab').className = 'tab-button flex items-center gap-2 px-6 py-3 rounded-lg transition bg-gradient-to-r from-teal-600 to-cyan-600 text-white shadow-lg font-semibold';
    }
}
</script>
@endpush