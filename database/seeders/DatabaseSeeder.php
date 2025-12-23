<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

use App\Models\User;
use App\Models\Kolam;
use App\Models\WaterQualityData;
use App\Models\Device;
use App\Models\Feedback;
use App\Models\DeviceIssue;
use App\Models\Product;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        /* =====================================================
         * 1. ADMIN
         * ===================================================== */
        $admin = User::create([
            'name' => 'Admin AquaVie',
            'email' => 'admin@aquavie.com',
            'password' => Hash::make('admin123'),
            'role' => 'admin',
            'phone' => '+62 812 1111 1111',
            'city' => 'Jakarta',
            'address' => 'Jl. Admin No. 1',
            'is_active' => true,
        ]);

        /* =====================================================
         * 2. USERS
         * ===================================================== */
        $users = collect([
            ['Ahmad Budiman','ahmad@email.com','Bogor','+62 812 2222 2222'],
            ['Siti Nurhaliza','siti@email.com','Bandung','+62 813 3333 3333'],
            ['Budi Santoso','budi@email.com','Tangerang','+62 814 4444 4444'],
            ['Dewi Lestari','dewi@email.com','Bekasi','+62 815 5555 5555'],
            ['Eko Prasetyo','eko@email.com','Depok','+62 816 6666 6666'],
        ])->map(function ($u) {
            return User::create([
                'name' => $u[0],
                'email' => $u[1],
                'password' => Hash::make('password'),
                'city' => $u[2],
                'phone' => $u[3],
                'address' => 'Jl. '.$u[0].' No. 123',
                'has_device' => rand(0,1),
                'role' => 'user',
                'is_active' => true,
            ]);
        });

        /* =====================================================
         * 3. KOLAMS
         * ===================================================== */
        $kolams = collect();
        foreach ($users as $user) {
            for ($i=1; $i<=rand(1,3); $i++) {
                $kolams->push(
                    Kolam::create([
                        'user_id' => $user->id,
                        'nama_kolam' => 'Kolam '.$i,
                        'lokasi' => 'Blok '.['Utara','Selatan','Timur','Barat'][rand(0,3)],
                        'deskripsi' => 'Budidaya ikan',
                        'is_active' => true,
                    ])
                );
            }
        }

        /* =====================================================
         * 4. DEVICES
         * ===================================================== */
        foreach ($kolams as $i => $kolam) {
            if ($kolam->user->has_device) {
                Device::create([
                    'device_id' => 'AQV-'.str_pad($i+1,3,'0',STR_PAD_LEFT),
                    'user_id' => $kolam->user_id,
                    'kolam_id' => $kolam->id,
                    'status' => ['active','offline','error'][rand(0,2)],
                    'last_sync' => now()->subMinutes(rand(1,120)),
                ]);
            }
        }

        /* =====================================================
         * 5. WATER QUALITY DATA
         * ===================================================== */
        foreach ($kolams as $kolam) {
            for ($d=0; $d<7; $d++) {
                WaterQualityData::create([
                    'user_id' => $kolam->user_id,
                    'kolam_id' => $kolam->id,
                    'ph' => rand(65,85)/10,
                    'suhu' => rand(24,30),
                    'tds' => rand(300,500),
                    'ec' => rand(500,800),
                    'tanggal' => now()->subDays($d),
                    'jam' => now()->format('H:i:s'),
                    'source' => 'manual',
                    'status' => 'aman',
                ]);
            }
        }

        /* =====================================================
         * 6. FEEDBACK
         * ===================================================== */
        foreach ($users as $user) {
            Feedback::create([
                'user_id' => $user->id,
                'feedback_type' => ['saran','kritik','pengalaman'][rand(0,2)],
                'message' => 'Aplikasi AquaVie sangat membantu',
                'status' => 'new',
            ]);
        }

        /* =====================================================
         * 7. DEVICE ISSUES
         * ===================================================== */
        foreach ($users as $user) {
            if ($user->has_device) {
                DeviceIssue::create([
                    'user_id' => $user->id,
                    'device_id' => 'AQV-001',
                    'lokasi_kolam' => 'Blok Utara',
                    'jenis_error' => 'koneksi',
                    'deskripsi' => 'Device offline',
                    'status' => 'pending',
                    'priority' => 'medium',
                ]);
            }
        }

        /* =====================================================
         * 8. PRODUCTS
         * ===================================================== */
        $products = [
            ['AquaVie Starter Kit', 2500000],
            ['AquaVie Pro', 5000000],
            ['AquaVie Enterprise', 12000000],
        ];

        foreach ($products as $p) {
            Product::create([
                'name' => $p[0],
                'slug' => Str::slug($p[0]),
                'price' => $p[1],
                'stock' => rand(10,50),
                'sold' => rand(1,30),
                'status' => 'active',
            ]);
        }

        $this->command->info('✅ AquaVie database seeded successfully');
    }
}