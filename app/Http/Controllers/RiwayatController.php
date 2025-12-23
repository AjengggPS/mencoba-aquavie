<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RiwayatController extends Controller
{
    public function index(Request $request)
    {
        $data = collect([
            (object)[
                'tanggal' => '20 Des 2025',
                'jam' => '18:00',
                'kolam' => 'Kolam A',
                'lokasi' => 'Blok Utara',
                'pH' => '7.2',
                'suhu' => '27',
                'TDS' => '415',
                'EC' => '635',
                'source' => 'Manual'
            ],
            (object)[
                'tanggal' => '20 Des 2025',
                'jam' => '12:00',
                'kolam' => 'Kolam B',
                'lokasi' => 'Blok Selatan',
                'pH' => '7.0',
                'suhu' => '28',
                'TDS' => '430',
                'EC' => '650',
                'source' => 'Sensor'
            ],
        ]);

        return view('user.riwayat', compact('data'));
    }

    public function export(Request $request)
    {
        $format = $request->get('format', 'pdf');
        return back()->with('success', "Data berhasil diexport ke {$format}!");
    }
}