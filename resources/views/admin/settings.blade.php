<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Settings - AquaVie</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
    <div class="flex h-screen bg-gradient-to-br from-gray-50 to-gray-100">
        <!-- Sidebar -->
        @include('layouts.admin-sidebar')
        
        <div class="flex-1 flex flex-col overflow-hidden">
            <!-- Topbar -->
            @include('layouts.admin-topbar', ['pageTitle' => 'Settings'])
            
            <div class="flex-1 overflow-y-auto p-8">
                <h1 class="text-3xl font-bold mb-8 text-gray-800">Settings</h1>

                <div class="max-w-4xl">
                    <form action="{{ route('admin.settings.update') }}" method="POST">
                        @csrf
                        @method('PUT')
                        
                        <div class="bg-white rounded-2xl p-8 shadow-lg mb-8">
                            <h2 class="text-2xl font-semibold mb-6 text-gray-800">Threshold Kualitas Air</h2>
                            <p class="text-gray-600 mb-8">
                                Atur nilai batas normal dan kritis untuk setiap parameter kualitas air
                            </p>

                            <div class="space-y-8">
                                <!-- pH Settings -->
                                <div class="border-b border-gray-200 pb-8">
                                    <h3 class="text-xl font-semibold mb-4 text-teal-700">pH</h3>
                                    <div class="grid md:grid-cols-2 gap-6">
                                        <div>
                                            <label class="block text-gray-700 mb-2 font-medium">Normal Min</label>
                                            <input type="number" step="0.1" name="ph_min" value="6.5"
                                                class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:border-teal-500 focus:ring-2 focus:ring-teal-200 transition" />
                                        </div>
                                        <div>
                                            <label class="block text-gray-700 mb-2 font-medium">Normal Max</label>
                                            <input type="number" step="0.1" name="ph_max" value="8.5"
                                                class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:border-teal-500 focus:ring-2 focus:ring-teal-200 transition" />
                                        </div>
                                        <div>
                                            <label class="block text-gray-700 mb-2 font-medium">Critical Min</label>
                                            <input type="number" step="0.1" name="ph_critical_min" value="6.0"
                                                class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:border-teal-500 focus:ring-2 focus:ring-teal-200 transition" />
                                        </div>
                                        <div>
                                            <label class="block text-gray-700 mb-2 font-medium">Critical Max</label>
                                            <input type="number" step="0.1" name="ph_critical_max" value="9.0"
                                                class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:border-teal-500 focus:ring-2 focus:ring-teal-200 transition" />
                                        </div>
                                    </div>
                                </div>

                                <!-- Suhu Settings -->
                                <div class="border-b border-gray-200 pb-8">
                                    <h3 class="text-xl font-semibold mb-4 text-teal-700">Suhu (°C)</h3>
                                    <div class="grid md:grid-cols-2 gap-6">
                                        <div>
                                            <label class="block text-gray-700 mb-2 font-medium">Normal Min</label>
                                            <input type="number" name="suhu_min" value="25"
                                                class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:border-teal-500 focus:ring-2 focus:ring-teal-200 transition" />
                                        </div>
                                        <div>
                                            <label class="block text-gray-700 mb-2 font-medium">Normal Max</label>
                                            <input type="number" name="suhu_max" value="30"
                                                class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:border-teal-500 focus:ring-2 focus:ring-teal-200 transition" />
                                        </div>
                                        <div>
                                            <label class="block text-gray-700 mb-2 font-medium">Critical Min</label>
                                            <input type="number" name="suhu_critical_min" value="20"
                                                class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:border-teal-500 focus:ring-2 focus:ring-teal-200 transition" />
                                        </div>
                                        <div>
                                            <label class="block text-gray-700 mb-2 font-medium">Critical Max</label>
                                            <input type="number" name="suhu_critical_max" value="35"
                                                class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:border-teal-500 focus:ring-2 focus:ring-teal-200 transition" />
                                        </div>
                                    </div>
                                </div>

                                <!-- TDS Settings -->
                                <div class="border-b border-gray-200 pb-8">
                                    <h3 class="text-xl font-semibold mb-4 text-teal-700">TDS (ppm)</h3>
                                    <div class="grid md:grid-cols-2 gap-6">
                                        <div>
                                            <label class="block text-gray-700 mb-2 font-medium">Normal Min</label>
                                            <input type="number" name="tds_min" value="300"
                                                class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:border-teal-500 focus:ring-2 focus:ring-teal-200 transition" />
                                        </div>
                                        <div>
                                            <label class="block text-gray-700 mb-2 font-medium">Normal Max</label>
                                            <input type="number" name="tds_max" value="500"
                                                class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:border-teal-500 focus:ring-2 focus:ring-teal-200 transition" />
                                        </div>
                                        <div>
                                            <label class="block text-gray-700 mb-2 font-medium">Critical Min</label>
                                            <input type="number" name="tds_critical_min" value="200"
                                                class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:border-teal-500 focus:ring-2 focus:ring-teal-200 transition" />
                                        </div>
                                        <div>
                                            <label class="block text-gray-700 mb-2 font-medium">Critical Max</label>
                                            <input type="number" name="tds_critical_max" value="600"
                                                class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:border-teal-500 focus:ring-2 focus:ring-teal-200 transition" />
                                        </div>
                                    </div>
                                </div>

                                <!-- EC Settings -->
                                <div>
                                    <h3 class="text-xl font-semibold mb-4 text-teal-700">EC (μS/cm)</h3>
                                    <div class="grid md:grid-cols-2 gap-6">
                                        <div>
                                            <label class="block text-gray-700 mb-2 font-medium">Normal Min</label>
                                            <input type="number" name="ec_min" value="500"
                                                class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:border-teal-500 focus:ring-2 focus:ring-teal-200 transition" />
                                        </div>
                                        <div>
                                            <label class="block text-gray-700 mb-2 font-medium">Normal Max</label>
                                            <input type="number" name="ec_max" value="800"
                                                class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:border-teal-500 focus:ring-2 focus:ring-teal-200 transition" />
                                        </div>
                                        <div>
                                            <label class="block text-gray-700 mb-2 font-medium">Critical Min</label>
                                            <input type="number" name="ec_critical_min" value="400"
                                                class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:border-teal-500 focus:ring-2 focus:ring-teal-200 transition" />
                                        </div>
                                        <div>
                                            <label class="block text-gray-700 mb-2 font-medium">Critical Max</label>
                                            <input type="number" name="ec_critical_max" value="1000"
                                                class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:border-teal-500 focus:ring-2 focus:ring-teal-200 transition" />
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <button type="submit"
                                class="w-full mt-8 px-6 py-3 bg-gradient-to-r from-teal-600 to-cyan-600 text-white rounded-lg hover:shadow-xl transition transform hover:-translate-y-1 flex items-center justify-center gap-2 font-medium">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-3m-1 4l-3 3m0 0l-3-3m3 3V4"></path>
                                </svg>
                                Simpan Settings
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @if(session('success'))
    <script>
        alert('{{ session('success') }}');
    </script>
    @endif
</body>
</html>