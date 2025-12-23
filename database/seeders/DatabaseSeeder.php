<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Kolam;
use App\Models\WaterQualityData;
use App\Models\Device;
use App\Models\Feedback;
use App\Models\DeviceIssue;
use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Create Admin
        $admin = User::create([
            'name' => 'Admin AquaVie',
            'email' => 'admin@aquavie.com',
            'password' => Hash::make('admin123'),
            'phone' => '+62 812 1111 1111',
            'city' => 'Jakarta',
            'address' => 'Jl. Admin No. 1, Jakarta',
        ]);

        // 2. Create Regular Users
        $users = [];
        $userData = [
            ['name' => 'Ahmad Budiman', 'email' => 'ahmad@email.com', 'city' => 'Bogor', 'phone' => '+62 812 2222 2222'],
            ['name' => 'Siti Nurhaliza', 'email' => 'siti@email.com', 'city' => 'Bandung', 'phone' => '+62 813 3333 3333'],
            ['name' => 'Budi Santoso', 'email' => 'budi@email.com', 'city' => 'Tangerang', 'phone' => '+62 814 4444 4444'],
            ['name' => 'Dewi Lestari', 'email' => 'dewi@email.com', 'city' => 'Bekasi', 'phone' => '+62 815 5555 5555'],
            ['name' => 'Eko Prasetyo', 'email' => 'eko@email.com', 'city' => 'Depok', 'phone' => '+62 816 6666 6666'],
        ];

        foreach ($userData as $data) {
            $users[] = User::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => Hash::make('password'),
                'phone' => $data['phone'],
                'city' => $data['city'],
                'address' => 'Jl. ' . $data['name'] . ' No. 123',
                'has_device' => rand(0, 1),
                'device_id' => rand(0, 1) ? 'AQV-2024-' . str_pad(rand(1, 999), 3, '0', STR_PAD_LEFT) : null,
            ]);
        }

        // 3. Create Kolams
        $kolams = [];
        foreach ($users as $index => $user) {
            $kolamCount = rand(1, 3);
            for ($i = 1; $i <= $kolamCount; $i++) {
                $kolams[] = Kolam::create([
                    'user_id' => $user->id,
                    'nama_kolam' => 'Kolam ' . chr(64 + $i),
                    'lokasi' => 'Blok ' . ['Utara', 'Selatan', 'Timur', 'Barat'][rand(0, 3)],
                    'deskripsi' => 'Kolam budidaya ikan ' . ['Lele', 'Nila', 'Gurame', 'Patin'][rand(0, 3)],
                    'is_active' => true,
                ]);
            }
        }

        // 4. Create Devices
        foreach ($kolams as $index => $kolam) {
            if ($kolam->user->has_device && rand(0, 1)) {
                Device::create([
                    'device_id' => 'AQV-2024-' . str_pad($index + 1, 3, '0', STR_PAD_LEFT),
                    'user_id' => $kolam->user_id,
                    'kolam_id' => $kolam->id,
                    'status' => ['active', 'active', 'active', 'offline', 'error'][rand(0, 4)],
                    'last_sync' => now()->subMinutes(rand(1, 120)),
                ]);
            }
        }

        // 5. Create Water Quality Data
        foreach ($kolams as $kolam) {
            for ($day = 0; $day < 30; $day++) {
                $date = now()->subDays($day);
                
                for ($reading = 0; $reading < rand(2, 4); $reading++) {
                    $ph = round(rand(60, 85) / 10, 1);
                    $suhu = rand(24, 30);
                    $tds = rand(350, 500);
                    $ec = rand(550, 750);
                    
                    // Determine status
                    $status = 'aman';
                    if ($ph < 6.5 || $ph > 8.5 || $suhu < 25 || $suhu > 30 || $tds > 500 || $ec > 800) {
                        $status = 'peringatan';
                    }
                    if ($ph < 6.0 || $ph > 9.0 || $suhu < 20 || $suhu > 35 || $tds > 600 || $ec > 1000) {
                        $status = 'bahaya';
                    }
                    
                    WaterQualityData::create([
                        'user_id' => $kolam->user_id,
                        'kolam_id' => $kolam->id,
                        'ph' => $ph,
                        'suhu' => $suhu,
                        'tds' => $tds,
                        'ec' => $ec,
                        'tanggal' => $date->format('Y-m-d'),
                        'jam' => sprintf('%02d:00:00', rand(6, 18)),
                        'source' => $kolam->user->has_device && rand(0, 1) ? 'sensor' : 'manual',
                        'catatan' => rand(0, 3) == 0 ? 'Kondisi air ' . ['baik', 'normal', 'stabil'][rand(0, 2)] : null,
                        'status' => $status,
                    ]);
                }
            }
        }

        // 6. Create Feedback
        $feedbackTypes = ['saran', 'kritik', 'pengalaman', 'lainnya'];
        $feedbackMessages = [
            'Tolong tambahkan fitur export ke CSV juga',
            'Dashboard loading agak lambat saat banyak data',
            'Sangat membantu dalam monitoring kualitas air',
            'Bisa ditambahkan dark mode?',
            'Grafik sudah bagus tapi perlu lebih detail',
            'Aplikasi sangat user friendly',
            'Perlu notifikasi push mobile',
        ];

        foreach ($users as $user) {
            if (rand(0, 1)) {
                Feedback::create([
                    'user_id' => $user->id,
                    'feedback_type' => $feedbackTypes[rand(0, 3)],
                    'message' => $feedbackMessages[rand(0, count($feedbackMessages) - 1)],
                    'status' => ['new', 'reviewed', 'archived'][rand(0, 2)],
                ]);
            }
        }

        // 7. Create Device Issues
        $jenisErrors = ['koneksi', 'sensor', 'offline', 'hardware', 'lainnya'];
        $deskripsiErrors = [
            'Device tidak dapat terkoneksi ke WiFi',
            'Sensor pH memberikan hasil yang tidak akurat',
            'Device tiba-tiba offline tanpa sebab',
            'Kabel sensor rusak/putus',
            'Battery lemah perlu diganti',
        ];

        foreach ($users as $user) {
            if ($user->has_device && rand(0, 2) == 0) {
                DeviceIssue::create([
                    'user_id' => $user->id,
                    'device_id' => $user->device_id,
                    'lokasi_kolam' => $user->kolams->first()?->lokasi ?? 'Blok Utara',
                    'jenis_error' => $jenisErrors[rand(0, 4)],
                    'deskripsi' => $deskripsiErrors[rand(0, 4)],
                    'status' => ['pending', 'in-progress', 'resolved'][rand(0, 2)],
                    'priority' => ['low', 'medium', 'high', 'urgent'][rand(0, 3)],
                ]);
            }
        }

        // 8. Create Products
        Product::create([
            'name' => 'AquaVie Starter Kit',
            'description' => 'Paket starter untuk monitoring dasar dengan sensor pH dan suhu',
            'price' => 2500000,
            'stock' => 45,
            'sold' => 23,
            'status' => 'active',
        ]);

        Product::create([
            'name' => 'AquaVie Pro',
            'description' => 'Paket lengkap dengan semua sensor (pH, suhu, TDS, EC) untuk monitoring profesional',
            'price' => 5000000,
            'stock' => 28,
            'sold' => 67,
            'status' => 'active',
        ]);

        Product::create([
            'name' => 'AquaVie Enterprise',
            'description' => 'Paket enterprise dengan multiple sensors dan cloud analytics',
            'price' => 12000000,
            'stock' => 12,
            'sold' => 34,
            'status' => 'active',
        ]);

        echo "✅ Database seeding completed successfully!\n";
        echo "📧 Admin: admin@aquavie.com | Password: admin123\n";
        echo "📧 User Example: ahmad@email.com | Password: password\n";
    }
}