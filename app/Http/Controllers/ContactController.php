<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        return view('contact');
    }

    public function submit(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email',
            'subject' => 'required|max:255',
            'message' => 'required'
        ]);

        // TODO: Simpan ke database atau kirim email
        
        return back()->with('success', 'Pesan Anda telah terkirim! Tim kami akan segera menghubungi Anda dalam 1x24 jam.');
    }
}