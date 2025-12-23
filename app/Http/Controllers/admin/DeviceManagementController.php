<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DeviceManagementController extends Controller
{
    public function index()
    {
        $devices = [
            ['id' => 1, 'deviceId' => 'AQV-2024-001', 'user' => 'user@example.com', 'kolam' => 'Kolam A', 'lokasi' => 'Tangerang', 'status' => 'active', 'lastSync' => '2 min ago'],
            ['id' => 2, 'deviceId' => 'AQV-2024-002', 'user' => 'budidaya@mail.com', 'kolam' => 'Kolam B', 'lokasi' => 'Jakarta', 'status' => 'offline', 'lastSync' => '2 hours ago'],
            ['id' => 3, 'deviceId' => 'AQV-2024-003', 'user' => 'tambak@mail.com', 'kolam' => 'Kolam Premium', 'lokasi' => 'Bogor', 'status' => 'active', 'lastSync' => '5 min ago'],
            ['id' => 4, 'deviceId' => 'AQV-2024-004', 'user' => 'user@example.com', 'kolam' => 'Kolam C', 'lokasi' => 'Tangerang', 'status' => 'error', 'lastSync' => '1 day ago'],
        ];

        $stats = [
            'total' => 56,
            'active' => 45,
            'offline' => 8,
            'error' => 3,
        ];

        return view('admin.devices', compact('devices', 'stats'));
    }
}