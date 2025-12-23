<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class IssueManagementController extends Controller
{
    public function index()
    {
        $issues = [
            ['id' => 1, 'deviceId' => 'AQV-2024-001', 'user' => 'user@example.com', 'type' => 'Sensor Tidak Akurat', 'status' => 'pending', 'date' => '20 Des 2025', 'priority' => 'high'],
            ['id' => 2, 'deviceId' => 'AQV-2024-004', 'user' => 'tambak@mail.com', 'type' => 'Device Offline', 'status' => 'in-progress', 'date' => '19 Des 2025', 'priority' => 'urgent'],
            ['id' => 3, 'deviceId' => 'AQV-2024-002', 'user' => 'budidaya@mail.com', 'type' => 'Masalah Koneksi', 'status' => 'resolved', 'date' => '18 Des 2025', 'priority' => 'medium'],
            ['id' => 4, 'deviceId' => 'AQV-2024-007', 'user' => 'pembudidaya@mail.com', 'type' => 'Kerusakan Hardware', 'status' => 'pending', 'date' => '20 Des 2025', 'priority' => 'urgent'],
        ];

        $stats = [
            'total' => 48,
            'pending' => 12,
            'inProgress' => 8,
            'resolved' => 28,
        ];

        return view('admin.issues', compact('issues', 'stats'));
    }
}