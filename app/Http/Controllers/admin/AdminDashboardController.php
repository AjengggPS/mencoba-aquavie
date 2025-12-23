<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    public function index()
    {
        $stats = [
            [
                'label' => 'Total User',
                'value' => '1,234',
                'change' => '+12%',
                'color' => 'from-blue-500 to-blue-600',
            ],
            [
                'label' => 'Total Kolam',
                'value' => '2,456',
                'change' => '+8%',
                'color' => 'from-teal-500 to-teal-600',
            ],
            [
                'label' => 'Device Aktif',
                'value' => '45/56',
                'change' => '-2 offline',
                'color' => 'from-green-500 to-green-600',
            ],
            [
                'label' => 'Data Hari Ini',
                'value' => '3,456',
                'change' => '+156',
                'color' => 'from-purple-500 to-purple-600',
            ],
        ];

        $deviceStatus = [
            ['name' => 'Aktif', 'value' => 45, 'color' => '#10b981'],
            ['name' => 'Offline', 'value' => 8, 'color' => '#ef4444'],
            ['name' => 'Error', 'value' => 3, 'color' => '#f59e0b'],
        ];

        $insights = [
            [
                'color' => 'green',
                'text' => '89% kolam dalam kondisi normal. Performa monitoring sangat baik.',
            ],
            [
                'color' => 'yellow',
                'text' => '8 device dalam status offline. Perlu pengecekan koneksi atau maintenance.',
            ],
            [
                'color' => 'blue',
                'text' => '12 user baru terdaftar minggu ini. Pertumbuhan user stabil.',
            ],
            [
                'color' => 'red',
                'text' => '3 device issue yang memerlukan perhatian segera.',
            ],
        ];

        return view('admin.dashboard', compact('stats', 'deviceStatus', 'insights'));
    }
}