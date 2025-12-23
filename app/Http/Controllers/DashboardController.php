<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // Data notifikasi
        $pageTitle = 'Dashboard';
        
        $notifications = [
            [
                'message' => 'pH kolam A mencapai level peringatan',
                'time' => '10 menit lalu',
                'type' => 'warning'
            ],
            [
                'message' => 'Data berhasil disimpan',
                'time' => '1 jam lalu',
                'type' => 'success'
            ],
            [
                'message' => 'Suhu kolam B dalam kondisi optimal',
                'time' => '2 jam lalu',
                'type' => 'info'
            ],
        ];

        return view('user.dashboard', compact('pageTitle', 'notifications'));
    }
}