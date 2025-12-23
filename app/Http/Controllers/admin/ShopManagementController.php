<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ShopManagementController extends Controller
{
    public function index()
    {
        $products = [
            ['id' => 1, 'name' => 'AquaVie Starter Kit', 'price' => 'Rp 2.500.000', 'stock' => 45, 'sold' => 23, 'status' => 'active'],
            ['id' => 2, 'name' => 'AquaVie Pro', 'price' => 'Rp 5.000.000', 'stock' => 28, 'sold' => 67, 'status' => 'active'],
            ['id' => 3, 'name' => 'AquaVie Enterprise', 'price' => 'Rp 12.000.000', 'stock' => 12, 'sold' => 34, 'status' => 'active'],
        ];

        $orders = [
            ['product' => 'AquaVie Pro', 'email' => 'user@example.com', 'price' => 'Rp 5.000.000', 'date' => '20 Des 2025', 'status' => 'pending'],
            ['product' => 'AquaVie Starter Kit', 'email' => 'budidaya@mail.com', 'price' => 'Rp 2.500.000', 'date' => '19 Des 2025', 'status' => 'completed'],
        ];

        $stats = [
            'totalProducts' => 3,
            'totalStock' => 85,
            'totalSold' => 124,
            'revenue' => 'Rp 456M',
        ];

        return view('admin.shop', compact('products', 'orders', 'stats'));
    }

    public function show($id)
    {
        // Dummy data - nanti ganti dengan database
        $products = [
            1 => ['id' => 1, 'name' => 'AquaVie Starter Kit', 'price' => 'Rp 2.500.000', 'stock' => 45, 'sold' => 23, 'status' => 'active', 'description' => 'Paket starter untuk pembudidaya pemula'],
            2 => ['id' => 2, 'name' => 'AquaVie Pro', 'price' => 'Rp 5.000.000', 'stock' => 28, 'sold' => 67, 'status' => 'active', 'description' => 'Paket profesional dengan fitur lengkap'],
            3 => ['id' => 3, 'name' => 'AquaVie Enterprise', 'price' => 'Rp 12.000.000', 'stock' => 12, 'sold' => 34, 'status' => 'active', 'description' => 'Paket enterprise untuk skala besar'],
        ];

        $product = $products[$id] ?? null;

        if (!$product) {
            return redirect()->route('admin.shop')->with('error', 'Product not found');
        }

        return view('admin.products.show', compact('product'));
    }

    public function edit($id)
    {
        // Dummy data - nanti ganti dengan database
        $products = [
            1 => ['id' => 1, 'name' => 'AquaVie Starter Kit', 'price' => '2500000', 'stock' => 45, 'sold' => 23, 'status' => 'active', 'description' => 'Paket starter untuk pembudidaya pemula'],
            2 => ['id' => 2, 'name' => 'AquaVie Pro', 'price' => '5000000', 'stock' => 28, 'sold' => 67, 'status' => 'active', 'description' => 'Paket profesional dengan fitur lengkap'],
            3 => ['id' => 3, 'name' => 'AquaVie Enterprise', 'price' => '12000000', 'stock' => 12, 'sold' => 34, 'status' => 'active', 'description' => 'Paket enterprise untuk skala besar'],
        ];

        $product = $products[$id] ?? null;

        if (!$product) {
            return redirect()->route('admin.shop')->with('error', 'Product not found');
        }

        return view('admin.products.edit', compact('product'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
            'status' => 'required|in:active,inactive',
            'description' => 'nullable|string',
        ]);

        // Logic untuk update product (dummy for now)
        // Nanti ganti dengan query database

        return redirect()->route('admin.shop')->with('success', 'Product berhasil diupdate!');
    }

    public function destroy($id)
    {
        // Logic untuk delete product (dummy for now)
        // Nanti ganti dengan query database

        return redirect()->route('admin.shop')->with('success', 'Product berhasil dihapus!');
    }
}