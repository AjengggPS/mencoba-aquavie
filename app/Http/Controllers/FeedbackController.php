<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FeedbackController extends Controller
{
    public function index()
    {
        return view('user.feedback', ['pageTitle' => 'Feedback & Support']);
    }

    public function store(Request $request)
    {
        $request->validate([
            'feedback_type' => 'required|string',
            'message' => 'required|string',
        ]);

        return back()->with('success', 'Terima kasih atas feedback Anda!');
    }

    public function storeDeviceIssue(Request $request)
    {
        $request->validate([
            'device_id' => 'required|string',
            'lokasi_kolam' => 'required|string',
            'jenis_error' => 'required|string',
            'deskripsi' => 'required|string',
        ]);

        return back()->with('success', 'Laporan berhasil dikirim. Tim kami akan menghubungi Anda segera.');
    }
}