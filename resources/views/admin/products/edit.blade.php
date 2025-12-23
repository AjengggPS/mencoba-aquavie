<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Product - AquaVie Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
    <div class="flex h-screen bg-gradient-to-br from-gray-50 to-gray-100">
        @include('layouts.admin-sidebar')
        
        <div class="flex-1 flex flex-col overflow-hidden">
            @include('layouts.admin-topbar', ['pageTitle' => 'Edit Product'])
            
            <div class="flex-1 overflow-y-auto p-8">
                <div class="flex items-center justify-between mb-8">
                    <h1 class="text-3xl font-bold text-gray-800">Edit Product</h1>
                    <a href="{{ route('admin.shop') }}" class="flex items-center gap-2 px-4 py-2 bg-gray-600 text-white rounded-lg hover:bg-gray-700 transition font-medium">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                        </svg>
                        Kembali
                    </a>
                </div>

                <div class="bg-white rounded-2xl shadow-lg p-8 max-w-3xl">
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

                    <form action="{{ route('admin.products.update', $product['id']) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                        @csrf
                        @method('PUT')

                        <div>
                            <label for="name" class="block text-gray-700 font-medium mb-2">Nama Product *</label>
                            <input
                                type="text"
                                id="name"
                                name="name"
                                value="{{ old('name', $product['name']) }}"
                                class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:border-teal-500 focus:ring-2 focus:ring-teal-200 transition"
                                required
                            />
                        </div>

                        <div>
                            <label for="price" class="block text-gray-700 font-medium mb-2">Harga (Rp) *</label>
                            <input
                                type="number"
                                id="price"
                                name="price"
                                value="{{ old('price', $product['price']) }}"
                                class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:border-teal-500 focus:ring-2 focus:ring-teal-200 transition"
                                required
                            />
                        </div>

                        <div class="grid md:grid-cols-2 gap-6">
                            <div>
                                <label for="stock" class="block text-gray-700 font-medium mb-2">Stock *</label>
                                <input
                                    type="number"
                                    id="stock"
                                    name="stock"
                                    value="{{ old('stock', $product['stock']) }}"
                                    class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:border-teal-500 focus:ring-2 focus:ring-teal-200 transition"
                                    required
                                />
                            </div>

                            <div>
                                <label for="status" class="block text-gray-700 font-medium mb-2">Status *</label>
                                <select
                                    id="status"
                                    name="status"
                                    class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:border-teal-500 focus:ring-2 focus:ring-teal-200 transition"
                                    required
                                >
                                    <option value="active" {{ old('status', $product['status']) === 'active' ? 'selected' : '' }}>Active</option>
                                    <option value="inactive" {{ old('status', $product['status']) === 'inactive' ? 'selected' : '' }}>Inactive</option>
                                </select>
                            </div>
                        </div>

                        <div>
                            <label for="description" class="block text-gray-700 font-medium mb-2">Deskripsi</label>
                            <textarea
                                id="description"
                                name="description"
                                rows="6"
                                class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:border-teal-500 focus:ring-2 focus:ring-teal-200 transition resize-none"
                            >{{ old('description', $product['description'] ?? '') }}</textarea>
                        </div>

                        <div class="flex gap-3">
                            <button
                                type="submit"
                                class="flex-1 px-6 py-3 bg-gradient-to-r from-teal-600 to-cyan-600 text-white rounded-lg hover:shadow-xl transition transform hover:-translate-y-1 font-semibold"
                            >
                                Update Product
                            </button>
                            <a href="{{ route('admin.shop') }}" class="flex-1 px-6 py-3 bg-gray-100 text-gray-700 rounded-lg hover:bg-gray-200 transition text-center font-semibold">
                                Batal
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>