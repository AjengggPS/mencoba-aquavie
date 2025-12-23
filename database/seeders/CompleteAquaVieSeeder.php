<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Models\User;
use App\Models\Kolam;
use App\Models\WaterQualityData;
use App\Models\Device;
use App\Models\Feedback;
use App\Models\DeviceIssue;
use App\Models\Product;
use App\Models\Order;
use Carbon\Carbon;

class CompleteAquaVieSeeder extends Seeder
{
    public function run(): void
    {
        echo "\n🌊 ================================\n";
        echo "   AQUAVIE DATABASE SEEDER\n";
        echo "================================\n\n";

        // 1. CREATE ADMIN
        echo "👤 Creating Admin...\n";
        $admin = User::create([
            'name' => 'Admin AquaVie',
            'email' => 'admin@aquavie.com',
            'password' => Hash::make('admin123'),
            'phone' => '+62 812 1111 1111',
            'city' => 'Jakarta',
            'address' => 'Telkom University Jakarta, Jl. Gading Batavia',
            'role' => 'admin',
            'has_device' => false,
            'is_active' => true,
            'email_verified_at' => now(),
        ]);
        echo "   ✓ Admin: admin@aquavie.com (admin123)\n\n";

        // 2. CREATE USERS
        echo "👥 Creating Users...\n";
        $users = [];
        $userData = [
            ['name' => 'Ahmad Budiman', 'email' => 'ahmad@email.com', 'city' => 'Bogor', 'phone' => '+62 812 2222 2222', 'has_device' => true],
            ['name' => 'Siti Nurhaliza', 'email' => 'siti@email.com', 'city' => 'Bandung', 'phone' => '+62 813 3333 3333', 'has_device' => false],
            ['name' => 'Budi Santoso', 'email' => 'budi@email.com', 'city' => 'Tangerang', 'phone' => '+62 814 4444 4444', 'has_device' => true],
            ['name' => 'Dewi Lestari', 'email' => 'dewi@email.com', 'city' => 'Bekasi', 'phone' => '+62 815 5555 5555', 'has_device' => false],
            ['name' => 'Eko Prasetyo', 'email' => 'eko@email.com', 'city' => 'Depok', 'phone' => '+62 816 6666 6666', 'has_device' => true],
            ['name' => 'Fitri Handayani', 'email' => 'fitri@email.com', 'city' => 'Cirebon', 'phone' => '+62 817 7777 7777', 'has_device' => false],
            ['name' => 'Gunawan Wibowo', 'email' => 'gunawan@email.com', 'city' => 'Sukabumi', 'phone' => '+62 818 8888 8888', 'has_device' => true],
        ];

        foreach ($userData as $index => $data) {
            $deviceId = $data['has_device'] ? 'AQV-2024-' . str_pad($index + 1, 3, '0', STR_PAD_LEFT) : null;
            
            $users[] = User::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => Hash::make('password'),
                'phone' => $data['phone'],
                'city' => $data['city'],
                'address' => 'Jl. ' . $data['name'] . ' No. ' . rand(10, 999),
                'has_device' => $data['has_device'],
                'device_id' => $deviceId,
                'role' => 'user',
                'is_active' => true,
                'email_verified_at' => now(),
            ]);
        }
        echo "   ✓ Created " . count($users) . " users (password: password)\n\n";

        // 3. CREATE KOLAMS
        echo "🏊 Creating Kolams...\n";
        $kolams = [];
        $kolamNames = ['A', 'B', 'C', 'D', 'E'];
        $lokasiBlok = ['Utara', 'Selatan', 'Timur', 'Barat'];
        $jenisIkan = ['Lele', 'Nila', 'Gurame', 'Patin', 'Bawal'];

        foreach ($users as $user) {
            $kolamCount = rand(1, 3);
            for ($i = 0; $i < $kolamCount; $i++) {
                $kolams[] = Kolam::create([
                    'user_id' => $user->id,
                    'nama_kolam' => 'Kolam ' . $kolamNames[$i],
                    'lokasi' => 'Blok ' . $lokasiBlok[array_rand($lokasiBlok)],
                    'deskripsi' => 'Kolam budidaya ikan ' . $jenisIkan[array_rand($jenisIkan)],
                    'luas_kolam' => rand(50, 500),
                    'kapasitas_ikan' => rand(500, 5000),
                    'jenis_ikan' => $jenisIkan[array_rand($jenisIkan)],
                    'is_active' => true,
                ]);
            }
        }
        echo "   ✓ Created " . count($kolams) . " kolams\n\n";

        // 4. CREATE DEVICES
        echo "📡 Creating Devices...\n";
        $deviceCount = 0;
        foreach ($kolams as $index => $kolam) {
            if ($kolam->user->has_device && rand(0, 1)) {
                Device::create([
                    'device_id' => 'AQV-2024-' . str_pad($deviceCount + 1, 3, '0', STR_PAD_LEFT),
                    'user_id' => $kolam->user_id,
                    'kolam_id' => $kolam->id,
                    'device_name' => 'AquaVie Pro - ' . $kolam->nama_kolam,
                    'device_model' => 'AquaVie Pro',
                    'status' => ['active', 'active', 'active', 'offline', 'error'][rand(0, 4)],
                    'last_sync' => now()->subMinutes(rand(1, 120)),
                    'sync_interval' => 30,
                    'battery_level' => rand(20, 100),
                    'firmware_version' => '1.' . rand(0, 5) . '.' . rand(0, 9),
                ]);
                $deviceCount++;
            }
        }
        echo "   ✓ Created $deviceCount devices\n\n";

        // 5. CREATE WATER QUALITY DATA
        echo "💧 Creating Water Quality Data...\n";
        $dataCount = 0;
        foreach ($kolams as $kolam) {
            // Data 30 hari terakhir
            for ($day = 0; $day < 30; $day++) {
                $date = now()->subDays($day);
                
                // 2-4 readings per day
                for ($reading = 0; $reading < rand(2, 4); $reading++) {
                    $ph = round(rand(60, 85) / 10, 1);
                    $suhu = rand(24, 32);
                    $tds = rand(300, 600);
                    $ec = rand(500, 900);
                    
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
                        'jam' => sprintf('%02d:%02d:00', rand(6, 18), rand(0, 59)),
                        'source' => $kolam->user->has_device && rand(0, 1) ? 'sensor' : 'manual',
                        'catatan' => rand(0, 3) == 0 ? 'Kondisi air ' . ['baik', 'normal', 'stabil'][rand(0, 2)] : null,
                        'status' => $status,
                    ]);
                    $dataCount++;
                }
            }
        }
        echo "   ✓ Created $dataCount water quality records\n\n";

        // 6. CREATE FEEDBACK
        echo "💬 Creating Feedback...\n";
        $feedbackTypes = ['saran', 'kritik', 'pengalaman', 'lainnya'];
        $feedbackMessages = [
            'Tolong tambahkan fitur export ke CSV',
            'Dashboard loading agak lambat',
            'Sangat membantu monitoring kualitas air',
            'Bisa ditambahkan dark mode?',
            'Grafik perlu lebih detail',
            'Aplikasi sangat user friendly',
            'Perlu notifikasi push mobile',
            'Sensor device sangat akurat',
        ];

        $feedbackCount = 0;
        foreach ($users as $user) {
            if (rand(0, 2) == 0) {
                Feedback::create([
                    'user_id' => $user->id,
                    'feedback_type' => $feedbackTypes[rand(0, 3)],
                    'message' => $feedbackMessages[rand(0, count($feedbackMessages) - 1)],
                    'status' => ['new', 'reviewed', 'in_progress', 'resolved'][rand(0, 3)],
                    'priority' => ['low', 'medium', 'high'][rand(0, 2)],
                ]);
                $feedbackCount++;
            }
        }
        echo "   ✓ Created $feedbackCount feedback\n\n";

        // 7. CREATE DEVICE ISSUES
        echo "⚠️  Creating Device Issues...\n";
        $jenisErrors = ['koneksi', 'sensor', 'offline', 'hardware', 'software'];
        $deskripsiErrors = [
            'Device tidak dapat terkoneksi WiFi',
            'Sensor pH tidak akurat',
            'Device offline tanpa sebab',
            'Kabel sensor rusak',
            'Battery lemah perlu diganti',
        ];

        $issueCount = 0;
        foreach ($users as $user) {
            if ($user->has_device && rand(0, 3) == 0) {
                DeviceIssue::create([
                    'user_id' => $user->id,
                    'device_id' => $user->device_id,
                    'lokasi_kolam' => $user->kolams->first()?->lokasi ?? 'Blok Utara',
                    'jenis_error' => $jenisErrors[rand(0, 4)],
                    'deskripsi' => $deskripsiErrors[rand(0, 4)],
                    'status' => ['pending', 'in-progress', 'resolved'][rand(0, 2)],
                    'priority' => ['low', 'medium', 'high', 'urgent'][rand(0, 3)],
                ]);
                $issueCount++;
            }
        }
        echo "   ✓ Created $issueCount device issues\n\n";

        // 8. CREATE PRODUCTS
        echo "🛒 Creating Products...\n";
        $products = [
            [
                'name' => 'AquaVie Starter Kit',
                'description' => 'Paket starter untuk pembudidaya pemula',
                'price' => 2500000,
                'stock' => 45,
                'sold' => 23,
            ],
            [
                'name' => 'AquaVie Pro',
                'description' => 'Paket profesional dengan fitur lengkap',
                'price' => 5000000,
                'stock' => 28,
                'sold' => 67,
            ],
            [
                'name' => 'AquaVie Enterprise',
                'description' => 'Paket enterprise untuk skala besar',
                'price' => 12000000,
                'stock' => 12,
                'sold' => 34,
            ],
        ];

        foreach ($products as $product) {
            Product::create([
                'name' => $product['name'],
                'slug' => Str::slug($product['name']),
                'description' => $product['description'],
                'price' => $product['price'],
                'stock' => $product['stock'],
                'sold' => $product['sold'],
                'status' => 'active',
            ]);
        }
        echo "   ✓ Created " . count($products) . " products\n\n";

        // 9. CREATE ORDERS
        echo "📦 Creating Orders...\n";
        $orderCount = 0;
        $productModels = Product::all();
        
        foreach ($users as $user) {
            if (rand(0, 2) == 0) {
                $product = $productModels->random();
                $quantity = rand(1, 2);
                
                Order::create([
                    'order_number' => 'ORD-' . now()->format('Ymd') . '-' . str_pad($orderCount + 1, 4, '0', STR_PAD_LEFT),
                    'user_id' => $user->id,
                    'product_id' => $product->id,
                    'quantity' => $quantity,
                    'unit_price' => $product->price,
                    'total_price' => $product->price * $quantity,
                    'discount' => 0,
                    'final_price' => $product->price * $quantity,
                    'status' => ['pending', 'confirmed', 'processing', 'shipped'][rand(0, 3)],
                    'payment_status' => ['unpaid', 'paid'][rand(0, 1)],
                    'shipping_address' => $user->address,
                    'shipping_city' => $user->city,
                    'shipping_phone' => $user->phone,
                ]);
                $orderCount++;
            }
        }
        echo "   ✓ Created $orderCount orders\n\n";

        // 10. CREATE THRESHOLDS
        echo "⚙️  Creating System Settings...\n";
        DB::table('water_quality_thresholds')->insert([
            ['parameter' => 'ph', 'normal_min' => 6.5, 'normal_max' => 8.5, 'critical_min' => 6.0, 'critical_max' => 9.0, 'unit' => '', 'is_active' => true, 'created_at' => now(), 'updated_at' => now()],
            ['parameter' => 'suhu', 'normal_min' => 25, 'normal_max' => 30, 'critical_min' => 20, 'critical_max' => 35, 'unit' => '°C', 'is_active' => true, 'created_at' => now(), 'updated_at' => now()],
            ['parameter' => 'tds', 'normal_min' => 300, 'normal_max' => 500, 'critical_min' => 200, 'critical_max' => 600, 'unit' => 'ppm', 'is_active' => true, 'created_at' => now(), 'updated_at' => now()],
            ['parameter' => 'ec', 'normal_min' => 500, 'normal_max' => 800, 'critical_min' => 400, 'critical_max' => 1000, 'unit' => 'μS/cm', 'is_active' => true, 'created_at' => now(), 'updated_at' => now()],
        ]);

        DB::table('system_settings')->insert([
            ['setting_key' => 'site_name', 'setting_value' => 'AquaVie', 'setting_type' => 'text', 'category' => 'general', 'created_at' => now(), 'updated_at' => now()],
            ['setting_key' => 'site_email', 'setting_value' => 'support@aquavie.com', 'setting_type' => 'text', 'category' => 'general', 'created_at' => now(), 'updated_at' => now()],
            ['setting_key' => 'alert_enabled', 'setting_value' => 'true', 'setting_type' => 'boolean', 'category' => 'monitoring', 'created_at' => now(), 'updated_at' => now()],
        ]);
        echo "   ✓ System settings created\n\n";

        // SUMMARY
        echo "✅ ================================\n";
        echo "   SEEDING COMPLETED!\n";
        echo "================================\n\n";
        echo "📊 Summary:\n";
        echo "   • Users: " . (count($users) + 1) . " (1 admin + " . count($users) . " users)\n";
        echo "   • Kolams: " . count($kolams) . "\n";
        echo "   • Devices: $deviceCount\n";
        echo "   • Water Data: $dataCount\n";
        echo "   • Feedback: $feedbackCount\n";
        echo "   • Issues: $issueCount\n";
        echo "   • Products: " . count($products) . "\n";
        echo "   • Orders: $orderCount\n\n";
        
        echo "🔑 Login:\n";
        echo "   Admin: admin@aquavie.com / admin123\n";
        echo "   User:  ahmad@email.com / password\n\n";
    }
}