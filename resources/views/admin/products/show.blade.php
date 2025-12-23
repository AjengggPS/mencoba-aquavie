<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Product - AquaVie Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
    <div class="flex h-screen bg-gradient-to-br from-gray-50 to-gray-100">
        @include('layouts.admin-sidebar')
        
        <div class="flex-1 flex flex-col overflow-hidden">
            @include('layouts.admin-topbar', ['pageTitle' => 'Detail Product'])
            
            <div class="flex-1 overflow-y-auto p-8">
                <div class="flex items-center justify-between mb-8">
                    <h1 class="text-3xl font-bold text-gray-800">Detail Product</h1>
                    <a href="{{ route('admin.shop') }}" class="flex items-center gap-2 px-4 py-2 bg-gray-600 text-white rounded-lg hover:bg-gray-700 transition font-medium">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                        </svg>
                        Kembali
                    </a>
                </div>

                <div class="bg-white rounded-2xl shadow-lg overflow-hidden max-w-4xl">
                    <div class="p-8">
                        <div class="grid md:grid-cols-2 gap-8">
                            <!-- Product Image Placeholder -->
                            <div class="bg-gradient-to-br from-teal-100 to-cyan-100 rounded-2xl aspect-square flex items-center justify-center">
                                <svg class="w-32 h-32 text-teal-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                                </svg>
                            </div>

                            <!-- Product Details -->
                            <div>
                                <div class="mb-6">
                                    <span class="inline-block px-4 py-1 rounded-full text-sm font-semibold {{ $product['status'] === 'active' ? 'bg-green-100 text-green-700' : 'bg-gray-100 text-gray-700' }}">
                                        {{ ucfirst($product['status']) }}
                                    </span>
                                </div>

                                <h2 class="text-3xl font-bold mb-4 text-gray-800">{{ $product['name'] }}</h2>
                                <p class="text-4xl font-bold text-teal-600 mb-6">{{ $product['price'] }}</p>

                                <div class="space-y-4 mb-8">
                                    <div class="flex justify-between items-center py-3 border-b border-gray-200">
                                        <span class="text-gray-600">Stock Tersedia</span>
                                        <span class="text-gray-800 font-semibold">{{ $product['stock'] }} unit</span>
                                    </div>
                                    <div class="flex justify-between items-center py-3 border-b border-gray-200">
                                        <span class="text-gray-600">Total Terjual</span>
                                        <span class="text-gray-800 font-semibold">{{ $product['sold'] }} unit</span>
                                    </div>
                                </div>

                                <div class="mb-8">
                                    <h3 class="text-lg font-semibold mb-3 text-gray-800">Deskripsi</h3>
                                    <p class="text-gray-600">{{ $product['description'] ?? 'Tidak ada deskripsi' }}</p>
                                </div>

                                <div class="flex gap-3">
                                    <a href="{{ route('admin.products.edit', $product['id']) }}" class="flex-1 px-6 py-3 bg-gradient-to-r from-teal-600 to-cyan-600 text-white rounded-lg hover:shadow-lg transition text-center font-semibold">
                                        Edit Product
                                    </a>
                                    <form action="{{ route('admin.products.destroy', $product['id']) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus produk ini?')" class="flex-1">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="w-full px-6 py-3 bg-red-600 text-white rounded-lg hover:bg-red-700 transition font-semibold">
                                            Hapus Product
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>