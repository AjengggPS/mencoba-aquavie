<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('water_quality_data', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('kolam_id')->constrained()->onDelete('cascade');
            $table->decimal('ph', 4, 2);
            $table->decimal('suhu', 5, 2)->comment('Suhu dalam Celsius');
            $table->integer('tds')->comment('Total Dissolved Solids dalam ppm');
            $table->integer('ec')->comment('Electrical Conductivity dalam μS/cm');
            $table->date('tanggal');
            $table->time('jam');
            $table->enum('source', ['manual', 'sensor'])->default('manual');
            $table->text('catatan')->nullable();
            $table->enum('status', ['aman', 'peringatan', 'bahaya'])->default('aman');
            $table->json('analysis_data')->nullable();
            $table->timestamps();
            
            $table->index(['user_id', 'kolam_id', 'tanggal']);
            $table->index('status');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('water_quality_data');
    }
};