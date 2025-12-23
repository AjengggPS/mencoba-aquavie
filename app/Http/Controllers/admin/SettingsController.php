<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    public function index()
    {
        $thresholds = [
            'pH' => [
                'min' => 6.5,
                'max' => 8.5,
                'criticalMin' => 6.0,
                'criticalMax' => 9.0,
            ],
            'suhu' => [
                'min' => 25,
                'max' => 30,
                'criticalMin' => 20,
                'criticalMax' => 35,
            ],
            'TDS' => [
                'min' => 300,
                'max' => 500,
                'criticalMin' => 200,
                'criticalMax' => 600,
            ],
            'EC' => [
                'min' => 500,
                'max' => 800,
                'criticalMin' => 400,
                'criticalMax' => 1000,
            ],
        ];

        return view('admin.settings', compact('thresholds'));
    }

    public function update(Request $request)
    {
        // Logic untuk save settings
        return back()->with('success', 'Settings berhasil disimpan!');
    }
}