<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shop Management - AquaVie</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
    <div class="flex h-screen bg-gradient-to-br from-gray-50 to-gray-100">
        <!-- Sidebar -->
        @include('layouts.admin-sidebar')
        
        <div class="flex-1 flex flex-col overflow-hidden">
            <!-- Topbar -->
            @include('layouts.admin-topbar', ['pageTitle' => 'Shop Management'])
            
            <div class="flex-1 overflow-y-auto p-8">
                <div class="flex items-center justify-between mb-8">
                    <h1 class="text-3xl font-bold text-gray-800">Shop Management</h1>
                    <button class="flex items-center gap-2 px-4 py-2 bg-gradient-to-r from-teal-600 to-cyan-600 text-white rounded-lg hover:shadow-lg transition font-medium">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                        </svg>
                        Add Product
                    </button>
                </div>

                <!-- Stats -->
                <div class="grid md:grid-cols-4 gap-6 mb-8">
                    <div class="bg-white rounded-2xl p-6 shadow-lg">
                        <p class="text-gray-600 mb-2">Total Products</p>
                        <p class="text-3xl font-bold text-gray-800">3</p>
                    </div>
                    <div class="bg-white rounded-2xl p-6 shadow-lg">
                        <p class="text-gray-600 mb-2">Total Stock</p>
                        <p class="text-3xl font-bold text-teal-600">85</p>
                    </div>
                    <div class="bg-white rounded-2xl p-6 shadow-lg">
                        <p class="text-gray-600 mb-2">Total Sold</p>
                        <p class="text-3xl font-bold text-green-600">124</p>
                    </div>
                    <div class="bg-white rounded-2xl p-6 shadow-lg">
                        <p class="text-gray-600 mb-2">Revenue</p>
                        <p class="text-3xl font-bold text-blue-600">Rp 456M</p>
                    </div>
                </div>

                <!-- Table -->
                <div class="bg-white rounded-2xl shadow-lg overflow-hidden">
                    <div class="overflow-x-auto">
                        <table class="w-full">
                            <thead class="bg-gradient-to-r from-teal-600 to-cyan-600 text-white">
                                <tr>
                                    <th class="px-6 py-4 text-left">Product Name</th>
                                    <th class="px-6 py-4 text-left">Price</th>
                                    <th class="px-6 py-4 text-left">Stock</th>
                                    <th class="px-6 py-4 text-left">Sold</th>
                                    <th class="px-6 py-4 text-left">Status</th>
                                    <th class="px-6 py-4 text-left">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                $products = [
                                    ['id' => 1, 'name' => 'AquaVie Starter Kit', 'price' => 'Rp 2.500.000', 'stock' => 45, 'sold' => 23, 'status' => 'active'],
                                    ['id' => 2, 'name' => 'AquaVie Pro', 'price' => 'Rp 5.000.000', 'stock' => 28, 'sold' => 67, 'status' => 'active'],
                                    ['id' => 3, 'name' => 'AquaVie Enterprise', 'price' => 'Rp 12.000.000', 'stock' => 12, 'sold' => 34, 'status' => 'active'],
                                ];
                                @endphp
                                @foreach($products as $index => $product)
                                <tr class="border-b border-gray-100 hover:bg-gray-50 transition {{ $index % 2 === 0 ? 'bg-white' : 'bg-gray-50' }}">
                                    <td class="px-6 py-4 text-gray-700 font-medium">{{ $product['name'] }}</td>
                                    <td class="px-6 py-4 text-gray-700">{{ $product['price'] }}</td>
                                    <td class="px-6 py-4 text-gray-700">{{ $product['stock'] }}</td>
                                    <td class="px-6 py-4 text-gray-700">{{ $product['sold'] }}</td>
                                    <td class="px-6 py-4">
                                        <span class="px-3 py-1 bg-green-100 text-green-700 rounded-full text-xs capitalize font-medium">
                                            {{ $product['status'] }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="flex gap-2">
                                            <a href="{{ route('admin.products.show', $product['id']) }}" class="p-2 text-blue-600 hover:bg-blue-50 rounded-lg transition">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                                </svg>
                                            </a>
                                            <a href="{{ route('admin.products.edit', $product['id']) }}" class="p-2 text-teal-600 hover:bg-teal-50 rounded-lg transition">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                                </svg>
                                            </a>
                                            <form action="{{ route('admin.products.destroy', $product['id']) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus produk ini?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="p-2 text-red-600 hover:bg-red-50 rounded-lg transition">
                                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                                    </svg>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Orders Section -->
                <div class="mt-8 bg-white rounded-2xl p-6 shadow-lg">
                    <h2 class="text-xl font-semibold mb-6 text-gray-800">Recent Orders</h2>
                    <div class="space-y-4">
                        @php
                        $orders = [
                            ['product' => 'AquaVie Pro', 'email' => 'user@example.com', 'price' => 'Rp 5.000.000', 'date' => '20 Des 2025', 'status' => 'pending'],
                            ['product' => 'AquaVie Starter Kit', 'email' => 'budidaya@mail.com', 'price' => 'Rp 2.500.000', 'date' => '19 Des 2025', 'status' => 'completed'],
                        ];
                        @endphp
                        @foreach($orders as $order)
                        <div class="flex items-center justify-between p-4 bg-gray-50 rounded-lg hover:bg-gray-100 transition">
                            <div>
                                <p class="text-gray-800 font-medium">{{ $order['product'] }}</p>
                                <p class="text-sm text-gray-600">{{ $order['email'] }}</p>
                            </div>
                            <div class="text-right">
                                <p class="text-gray-800 font-semibold">{{ $order['price'] }}</p>
                                <p class="text-sm text-gray-600">{{ $order['date'] }}</p>
                            </div>
                            <span class="px-3 py-1 rounded-full text-xs font-medium
                                {{ $order['status'] === 'pending' ? 'bg-yellow-100 text-yellow-700' : 'bg-green-100 text-green-700' }}">
                                {{ ucfirst($order['status']) }}
                            </span>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>