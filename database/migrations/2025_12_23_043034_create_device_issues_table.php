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
            $table->string('device_id', 50);
            $table->string('lokasi_kolam', 200);
            $table->enum('jenis_error', ['koneksi', 'sensor', 'offline', 'hardware', 'software', 'lainnya']);
            $table->text('deskripsi');
            $table->enum('status', ['pending', 'in-progress', 'resolved', 'closed'])->default('pending');
            $table->enum('priority', ['low', 'medium', 'high', 'urgent'])->default('medium');
            $table->foreignId('assigned_to')->nullable()->constrained('users')->onDelete('set null');
            $table->text('solution')->nullable();
            $table->timestamp('resolved_at')->nullable();
            $table->timestamps();
            
            $table->index(['status', 'priority']);
            $table->index('device_id');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('device_issues');
    }
};