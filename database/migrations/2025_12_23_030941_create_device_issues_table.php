<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('device_issues', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('device_id');
            $table->string('lokasi_kolam');
            $table->enum('jenis_error', ['koneksi', 'sensor', 'offline', 'hardware', 'lainnya']);
            $table->text('deskripsi');
            $table->enum('status', ['pending', 'in-progress', 'resolved'])->default('pending');
            $table->enum('priority', ['low', 'medium', 'high', 'urgent'])->default('medium');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('device_issues');
    }
};