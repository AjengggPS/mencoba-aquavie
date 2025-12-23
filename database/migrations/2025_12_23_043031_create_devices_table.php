<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('devices', function (Blueprint $table) {
            $table->id();
            $table->string('device_id', 50)->unique();
            $table->foreignId('user_id')->nullable()->constrained()->onDelete('set null');
            $table->foreignId('kolam_id')->nullable()->constrained()->onDelete('set null');
            $table->string('device_name', 100)->nullable();
            $table->string('device_model', 100)->default('AquaVie Pro');
            $table->enum('status', ['active', 'offline', 'error', 'maintenance'])->default('active');
            $table->timestamp('last_sync')->nullable();
            $table->integer('sync_interval')->default(30)->comment('Interval sync dalam menit');
            $table->decimal('battery_level', 5, 2)->nullable()->comment('Level battery dalam persen');
            $table->string('firmware_version', 20)->nullable();
            $table->json('device_settings')->nullable();
            $table->text('notes')->nullable();
            $table->timestamps();
            $table->softDeletes();
            
            $table->index(['status', 'user_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('devices');
    }
};