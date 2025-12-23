<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MonitoringController extends Controller
{
    public function index()
    {
        $kolamData = [
            ['id' => 1, 'user' => 'User A', 'kolam' => 'Kolam A1', 'lokasi' => 'Tangerang', 'pH' => 7.2, 'suhu' => 27, 'TDS' => 420, 'EC' => 635, 'status' => 'normal'],
            ['id' => 2, 'user' => 'User B', 'kolam' => 'Kolam B1', 'lokasi' => 'Jakarta', 'pH' => 6.7, 'suhu' => 28, 'TDS' => 450, 'EC' => 670, 'status' => 'warning'],
            ['id' => 3, 'user' => 'User C', 'kolam' => 'Kolam C1', 'lokasi' => 'Bogor', 'pH' => 7.4, 'suhu' => 26, 'TDS' => 410, 'EC' => 625, 'status' => 'normal'],
            ['id' => 4, 'user' => 'User A', 'kolam' => 'Kolam A2', 'lokasi' => 'Tangerang', 'pH' => 5.8, 'suhu' => 30, 'TDS' => 500, 'EC' => 720, 'status' => 'critical'],
        ];

        return view('admin.monitoring', compact('kolamData'));
    }
}