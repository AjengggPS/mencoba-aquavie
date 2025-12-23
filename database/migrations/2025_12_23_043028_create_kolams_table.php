<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('kolams', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('nama_kolam', 100);
            $table->string('lokasi', 200)->nullable();
            $table->text('deskripsi')->nullable();
            $table->decimal('luas_kolam', 10, 2)->nullable()->comment('Luas dalam m2');
            $table->integer('kapasitas_ikan')->nullable();
            $table->string('jenis_ikan', 100)->nullable();
            $table->boolean('is_active')->default(true);
            $table->timestamps();
            $table->softDeletes();
            
            $table->index(['user_id', 'is_active']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('kolams');
    }
};