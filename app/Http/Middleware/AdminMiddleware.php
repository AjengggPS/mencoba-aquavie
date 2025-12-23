<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        // Cek apakah user login DAN email-nya admin
        if (Auth::check() && Auth::user()->email === 'admin@aquavie.com') {
            return $next($request);
        }
        
        // Kalau bukan admin, redirect ke dashboard user
        return redirect('/dashboard')->with('error', 'Akses ditolak! Hanya admin yang bisa akses halaman ini.');
    }
}