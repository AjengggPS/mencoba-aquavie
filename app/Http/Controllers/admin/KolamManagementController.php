<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class KolamManagementController extends Controller
{
    public function index()
    {
        $kolamData = [
            ['id' => 1, 'user' => 'user@example.com', 'namaKolam' => 'Kolam A', 'lokasi' => 'Blok Utara, Tangerang', 'totalData' => 245, 'lastUpdate' => '20 Des 2025, 18:00'],
            ['id' => 2, 'user' => 'budidaya@mail.com', 'namaKolam' => 'Kolam B', 'lokasi' => 'Blok Selatan, Jakarta', 'totalData' => 189, 'lastUpdate' => '20 Des 2025, 17:45'],
            ['id' => 3, 'user' => 'tambak@mail.com', 'namaKolam' => 'Kolam Premium', 'lokasi' => 'Area Timur, Bogor', 'totalData' => 312, 'lastUpdate' => '20 Des 2025, 18:15'],
            ['id' => 4, 'user' => 'user@example.com', 'namaKolam' => 'Kolam C', 'lokasi' => 'Blok Barat, Tangerang', 'totalData' => 156, 'lastUpdate' => '20 Des 2025, 16:30'],
        ];

        $stats = [
            'totalKolam' => '2,456',
            'aktifHariIni' => '1,234',
            'totalData' => '45,678',
            'avgDataPerKolam' => '186',
        ];

        return view('admin.kolam', compact('kolamData', 'stats'));
    }
}