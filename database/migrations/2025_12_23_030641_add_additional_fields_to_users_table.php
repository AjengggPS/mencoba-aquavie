<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
public function up(): void
{
    Schema::table('users', function (Blueprint $table) {
        // Cek apakah kolom sudah ada sebelum menambahkan
        if (!Schema::hasColumn('users', 'phone')) {
            $table->string('phone')->nullable()->after('email');
        }
        
        $table->string('city')->nullable()->after('phone');
        $table->text('address')->nullable()->after('city');
        $table->boolean('has_device')->default(false)->after('address');
        $table->string('device_id')->nullable()->after('has_device');
    });
}

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['phone', 'city', 'address', 'has_device', 'device_id']);
        });
    }
};