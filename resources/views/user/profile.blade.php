@extends('layouts.app')

@section('title', 'Edit Profil - AquaVie')

@section('content')
<div class="flex h-screen bg-gradient-to-br from-gray-50 to-cyan-50">
    @include('layouts.sidebar')
    
    <div class="flex-1 flex flex-col overflow-hidden">
        @include('layouts.topbar', ['pageTitle' => 'Edit Profil'])
        
        <div class="flex-1 overflow-y-auto p-8">
            <h1 class="text-3xl font-bold mb-8 text-gray-800">Edit Profil</h1>

            <div class="max-w-3xl">
                <div class="bg-white rounded-2xl p-8 shadow-lg">
                    @if(session('success'))
                    <div class="mb-6 p-4 bg-green-100 border border-green-400 text-green-700 rounded-lg">
                        {{ session('success') }}
                    </div>
                    @endif

                    @if($errors->any())
                    <div class="mb-6 p-4 bg-red-100 border border-red-400 text-red-700 rounded-lg">
                        <ul class="list-disc list-inside">
                            @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif

                    <!-- Profile Picture -->
                    <div class="flex items-center gap-6 mb-8 pb-8 border-b border-gray-200">
                        <div class="w-24 h-24 bg-gradient-to-br from-teal-400 to-cyan-500 rounded-full flex items-center justify-center shadow-lg">
                            <svg class="w-12 h-12 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                            </svg>
                        </div>
                        <div>
                            <h2 class="text-xl font-semibold mb-1 text-gray-800">{{ Auth::user()->name ?? 'Pembudidaya' }}</h2>
                            <p class="text-gray-600">{{ Auth::user()->email ?? 'user@example.com' }}</p>
                            <button class="mt-2 text-sm text-teal-600 hover:text-teal-700 font-semibold">
                                Ubah Foto Profil
                            </button>
                        </div>
                    </div>

                    <!-- Form -->
                    <form action="{{ route('profile.update') }}" method="POST" class="space-y-6">
                        @csrf
                        @method('PUT')
                        
                        <div class="grid md:grid-cols-2 gap-6">
                            <div>
                                <label for="name" class="block text-gray-700 font-medium mb-2">Nama Lengkap</label>
                                <input
                                    type="text"
                                    id="name"
                                    name="name"
                                    value="{{ old('name', Auth::user()->name ?? 'Pembudidaya') }}"
                                    class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:border-teal-500 focus:ring-2 focus:ring-teal-200 transition"
                                />
                            </div>

                            <div>
                                <label for="email" class="block text-gray-700 font-medium mb-2">Email</label>
                                <input
                                    type="email"
                                    id="email"
                                    name="email"
                                    value="{{ old('email', Auth::user()->email ?? 'user@example.com') }}"
                                    class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:border-teal-500 focus:ring-2 focus:ring-teal-200 transition"
                                />
                            </div>
                        </div>

                        <div class="grid md:grid-cols-2 gap-6">
                            <div>
                                <label for="phone" class="block text-gray-700 font-medium mb-2">Nomor Telepon</label>
                                <input
                                    type="tel"
                                    id="phone"
                                    name="phone"
                                    value="{{ old('phone', Auth::user()->phone ?? '+62 812 3456 7890') }}"
                                    class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:border-teal-500 focus:ring-2 focus:ring-teal-200 transition"
                                />
                            </div>

                            <div>
                                <label for="city" class="block text-gray-700 font-medium mb-2">Kota</label>
                                <input
                                    type="text"
                                    id="city"
                                    name="city"
                                    value="{{ old('city', Auth::user()->city ?? 'Tangerang') }}"
                                    class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:border-teal-500 focus:ring-2 focus:ring-teal-200 transition"
                                />
                            </div>
                        </div>

                        <div>
                            <label for="address" class="block text-gray-700 font-medium mb-2">Alamat</label>
                            <textarea
                                id="address"
                                name="address"
                                rows="3"
                                class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:border-teal-500 focus:ring-2 focus:ring-teal-200 transition resize-none"
                            >{{ old('address', Auth::user()->address ?? 'Jl. Tambak Sejahtera No. 123') }}</textarea>
                        </div>

                        <div class="border-t border-gray-200 pt-6">
                            <div class="flex items-center gap-3 mb-4">
                                <input
                                    type="checkbox"
                                    id="hasDevice"
                                    name="has_device"
                                    {{ old('has_device', Auth::user()->has_device ?? false) ? 'checked' : '' }}
                                    class="w-5 h-5 text-teal-600 rounded focus:ring-teal-500"
                                    onchange="toggleDeviceId()"
                                />
                                <label for="hasDevice" class="text-gray-700 font-medium">
                                    Saya menggunakan perangkat AquaVie
                                </label>
                            </div>

                            <div id="deviceIdContainer" class="{{ old('has_device', Auth::user()->has_device ?? false) ? '' : 'hidden' }}">
                                <label for="deviceId" class="block text-gray-700 font-medium mb-2">Device ID</label>
                                <input
                                    type="text"
                                    id="deviceId"
                                    name="device_id"
                                    value="{{ old('device_id', Auth::user()->device_id ?? '') }}"
                                    class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:border-teal-500 focus:ring-2 focus:ring-teal-200 transition"
                                    placeholder="AQV-2024-001"
                                />
                            </div>
                        </div>

                        <button
                            type="submit"
                            class="w-full px-6 py-3 bg-gradient-to-r from-teal-600 to-cyan-600 text-white rounded-lg hover:shadow-xl transition transform hover:-translate-y-1 flex items-center justify-center gap-2 font-semibold"
                        >
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-3m-1 4l-3 3m0 0l-3-3m3 3V4"></path>
                            </svg>
                            Simpan Perubahan
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
function toggleDeviceId() {
    const checkbox = document.getElementById('hasDevice');
    const container = document.getElementById('deviceIdContainer');
    
    if (checkbox.checked) {
        container.classList.remove('hidden');
    } else {
        container.classList.add('hidden');
    }
}
</script>
@endpush