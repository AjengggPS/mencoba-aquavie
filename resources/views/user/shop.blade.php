@extends('layouts.app')

@section('title', 'Shop AquaVie')

@section('content')
<div class="flex h-screen bg-gradient-to-br from-gray-50 to-cyan-50">
    @include('layouts.sidebar')
    
    <div class="flex-1 flex flex-col overflow-hidden">
        @include('layouts.topbar', ['pageTitle' => 'Shop AquaVie'])
        
        <div class="flex-1 overflow-y-auto p-8">
            <h1 class="text-3xl font-bold mb-4 text-gray-800">Shop AquaVie</h1>
            <p class="text-gray-600 mb-8">
                Tingkatkan monitoring tambak Anda dengan perangkat AquaVie IoT
            </p>

            <!-- Benefits Section -->
            <div class="bg-gradient-to-r from-teal-50 to-cyan-50 rounded-2xl p-8 mb-8 border border-teal-200">
                <h2 class="text-2xl font-semibold mb-6 text-teal-800">Keunggulan Perangkat AquaVie</h2>
                <div class="grid md:grid-cols-2 gap-6">
                    <div class="flex items-start gap-3">
                        <svg class="w-6 h-6 text-teal-600 flex-shrink-0 mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                        </svg>
                        <div>
                            <h3 class="text-lg font-semibold mb-1 text-gray-800">Monitoring Real-Time</h3>
                            <p class="text-gray-600">
                                Data kualitas air diupdate otomatis setiap 30 menit tanpa perlu input manual
                            </p>
                        </div>
                    </div>
                    <div class="flex items-start gap-3">
                        <svg class="w-6 h-6 text-teal-600 flex-shrink-0 mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        <div>
                            <h3 class="text-lg font-semibold mb-1 text-gray-800">Akurasi Tinggi</h3>
                            <p class="text-gray-600">
                                Sensor berkualitas tinggi dengan akurasi 99% untuk hasil yang dapat diandalkan
                            </p>
                        </div>
                    </div>
                    <div class="flex items-start gap-3">
                        <svg class="w-6 h-6 text-teal-600 flex-shrink-0 mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                        </svg>
                        <div>
                            <h3 class="text-lg font-semibold mb-1 text-gray-800">Hemat Waktu</h3>
                            <p class="text-gray-600">
                                Tidak perlu lagi pengukuran manual, fokus pada pengelolaan tambak
                            </p>
                        </div>
                    </div>
                    <div class="flex items-start gap-3">
                        <svg class="w-6 h-6 text-teal-600 flex-shrink-0 mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        <div>
                            <h3 class="text-lg font-semibold mb-1 text-gray-800">Alert Otomatis</h3>
                            <p class="text-gray-600">
                                Terima notifikasi instant saat parameter air mencapai level berbahaya
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Product Card -->
            <div class="max-w-4xl mx-auto">
                <div class="bg-white rounded-3xl overflow-hidden shadow-2xl">
                    <div class="grid md:grid-cols-2 gap-0">
                        <!-- Product Image -->
                        <div class="h-96 md:h-auto overflow-hidden bg-gradient-to-br from-teal-100 to-cyan-100 flex items-center justify-center p-8">
                            <img 
                                src="https://images.unsplash.com/photo-1581092583537-20d51876f3e3?w=500&q=80"
                                alt="AquaVie Pro"
                                class="w-full h-full object-cover rounded-2xl shadow-lg"
                            />
                        </div>
                        
                        <!-- Product Details -->
                        <div class="p-8 flex flex-col justify-between">
                            <div>
                                <div class="inline-block px-4 py-1 bg-gradient-to-r from-teal-600 to-cyan-600 text-white rounded-full text-sm mb-4 font-semibold">
                                    Best Seller
                                </div>
                                <h2 class="text-3xl font-bold mb-4 text-gray-800">AquaVie Pro</h2>
                                <p class="text-4xl font-bold mb-6 text-teal-600">Rp 5.000.000</p>
                                <p class="text-gray-600 mb-6 leading-relaxed">
                                    Paket lengkap dengan semua sensor (pH, suhu, TDS, EC) untuk monitoring profesional. 
                                    Dilengkapi dengan koneksi 4G/WiFi dan battery tahan lama hingga 1 tahun.
                                </p>
                                
                                <!-- Features -->
                                <div class="space-y-4 mb-8">
                                    <h3 class="text-lg font-semibold text-gray-800 mb-3">Fitur Lengkap:</h3>
                                    <div class="flex items-center gap-3">
                                        <div class="w-10 h-10 bg-teal-100 rounded-lg flex items-center justify-center">
                                            <svg class="w-5 h-5 text-teal-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                            </svg>
                                        </div>
                                        <span class="text-gray-700">4 Sensor Lengkap (pH, Suhu, TDS, EC)</span>
                                    </div>
                                    <div class="flex items-center gap-3">
                                        <div class="w-10 h-10 bg-cyan-100 rounded-lg flex items-center justify-center">
                                            <svg class="w-5 h-5 text-cyan-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.111 16.404a5.5 5.5 0 017.778 0M12 20h.01m-7.08-7.071c3.904-3.905 10.236-3.905 14.141 0M1.394 9.393c5.857-5.857 15.355-5.857 21.213 0"></path>
                                            </svg>
                                        </div>
                                        <span class="text-gray-700">Koneksi 4G/WiFi Dual Mode</span>
                                    </div>
                                    <div class="flex items-center gap-3">
                                        <div class="w-10 h-10 bg-green-100 rounded-lg flex items-center justify-center">
                                            <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                                            </svg>
                                        </div>
                                        <span class="text-gray-700">Battery Tahan 1 Tahun</span>
                                    </div>
                                    <div class="flex items-center gap-3">
                                        <div class="w-10 h-10 bg-purple-100 rounded-lg flex items-center justify-center">
                                            <svg class="w-5 h-5 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"></path>
                                            </svg>
                                        </div>
                                        <span class="text-gray-700">Alert Otomatis Real-time</span>
                                    </div>
                                    <div class="flex items-center gap-3">
                                        <div class="w-10 h-10 bg-blue-100 rounded-lg flex items-center justify-center">
                                            <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 15a4 4 0 004 4h9a5 5 0 10-.1-9.999 5.002 5.002 0 10-9.78 2.096A4.001 4.001 0 003 15z"></path>
                                            </svg>
                                        </div>
                                        <span class="text-gray-700">Cloud Storage Unlimited</span>
                                    </div>
                                </div>
                            </div>

                            <button
                                onclick="handleOrder()"
                                class="w-full px-8 py-4 bg-gradient-to-r from-teal-600 to-cyan-600 text-white rounded-xl hover:shadow-2xl transition transform hover:-translate-y-1 flex items-center justify-center gap-3 text-lg font-semibold"
                            >
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path>
                                </svg>
                                Ajukan Integrasi Sekarang
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Contact Info -->
            <div class="mt-8 bg-white rounded-2xl p-8 shadow-lg max-w-4xl mx-auto">
                <h2 class="text-2xl font-semibold mb-4 text-gray-800">Butuh Konsultasi?</h2>
                <p class="text-gray-600 mb-4">
                    Tim kami siap membantu Anda memilih paket yang sesuai dengan kebutuhan tambak Anda.
                </p>
                <div class="grid md:grid-cols-2 gap-4">
                    <div class="bg-gradient-to-r from-teal-50 to-cyan-50 rounded-xl p-4 border border-teal-200">
                        <p class="text-sm text-gray-600 mb-1">WhatsApp</p>
                        <p class="text-lg text-teal-700 font-semibold">+62 812 3456 7890</p>
                    </div>
                    <div class="bg-gradient-to-r from-teal-50 to-cyan-50 rounded-xl p-4 border border-teal-200">
                        <p class="text-sm text-gray-600 mb-1">Email</p>
                        <p class="text-lg text-teal-700 font-semibold">sales@aquavie.com</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
function handleOrder() {
    alert('Terima kasih! Tim kami akan menghubungi Anda untuk proses pemesanan AquaVie Pro.');
    // You can also redirect to a contact form or WhatsApp
    // window.location.href = 'https://wa.me/6281234567890?text=Halo, saya ingin memesan AquaVie Pro';
}
</script>
@endpush