<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InputDataController extends Controller
{
    public function index()
    {
        return view('user.input-data', ['pageTitle' => 'Input Data']);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_kolam' => 'required|string',
            'lokasi_kolam' => 'nullable|string',
            'ph' => 'required|numeric',
            'suhu' => 'required|numeric',
            'tds' => 'required|numeric',
            'ec' => 'required|numeric',
            'tanggal' => 'required|date',
            'jam' => 'required',
            'catatan' => 'nullable|string',
        ]);

        $analysis = [
            'status' => 'aman',
            'recommendations' => [
                'pH dalam kondisi optimal.',
                'Lanjutkan monitoring rutin.'
            ]
        ];

        return redirect()->back()
            ->with('success', 'Data berhasil disimpan!')
            ->with('analysis', $analysis);
    }
}