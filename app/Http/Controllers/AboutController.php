<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index()
    {
        // Data tim - GANTI dengan data tim Anda
        $team = [
            [
                'name' => 'Ahmad Fauzi',
                'nim' => '102012345001',
                'role' => 'Project Manager',
                'photo' => 'https://ui-avatars.com/api/?name=Ahmad+Fauzi&size=200&background=0891b2&color=fff&bold=true'
            ],
            [
                'name' => 'Siti Nurhaliza',
                'nim' => '102012345002',
                'role' => 'Backend Developer',
                'photo' => 'https://ui-avatars.com/api/?name=Siti+Nurhaliza&size=200&background=0891b2&color=fff&bold=true'
            ],
            [
                'name' => 'Budi Santoso',
                'nim' => '102012345003',
                'role' => 'Frontend Developer',
                'photo' => 'https://ui-avatars.com/api/?name=Budi+Santoso&size=200&background=0891b2&color=fff&bold=true'
            ],
            [
                'name' => 'Dewi Lestari',
                'nim' => '102012345004',
                'role' => 'UI/UX Designer',
                'photo' => 'https://ui-avatars.com/api/?name=Dewi+Lestari&size=200&background=0891b2&color=fff&bold=true'
            ],
            [
                'name' => 'Eko Prasetyo',
                'nim' => '102012345005',
                'role' => 'Database Administrator',
                'photo' => 'https://ui-avatars.com/api/?name=Eko+Prasetyo&size=200&background=0891b2&color=fff&bold=true'
            ],
            [
                'name' => 'Rina Wijaya',
                'nim' => '102012345006',
                'role' => 'Quality Assurance',
                'photo' => 'https://ui-avatars.com/api/?name=Rina+Wijaya&size=200&background=0891b2&color=fff&bold=true'
            ]
        ];

        return view('about', compact('team'));
    }
}