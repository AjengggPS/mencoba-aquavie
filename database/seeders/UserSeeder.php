<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run()
    {
        // Admin User
        User::create([
            'name' => 'Admin AquaVie',
            'email' => 'admin@aquavie.com',
            'password' => Hash::make('admin123'),
        ]);

        // Regular User
        User::create([
            'name' => 'User Example',
            'email' => 'user@example.com',
            'password' => Hash::make('password'),
        ]);
    }
}