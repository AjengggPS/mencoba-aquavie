<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('water_quality_thresholds', function (Blueprint $table) {
            $table->id();
            $table->string('parameter', 50);
            $table->decimal('normal_min', 10, 2);
            $table->decimal('normal_max', 10, 2);
            $table->decimal('critical_min', 10, 2);
            $table->decimal('critical_max', 10, 2);
            $table->string('unit', 20)->nullable();
            $table->text('description')->nullable();
            $table->boolean('is_active')->default(true);
            $table->timestamps();
            
            $table->unique('parameter');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('water_quality_thresholds');
    }
};