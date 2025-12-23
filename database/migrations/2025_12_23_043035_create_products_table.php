<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name', 200);
            $table->string('slug', 250)->unique();
            $table->text('description')->nullable();
            $table->text('long_description')->nullable();
            $table->decimal('price', 15, 2);
            $table->decimal('original_price', 15, 2)->nullable();
            $table->integer('stock')->default(0);
            $table->integer('sold')->default(0);
            $table->enum('status', ['active', 'inactive', 'out_of_stock'])->default('active');
            $table->string('image', 500)->nullable();
            $table->json('images')->nullable();
            $table->json('features')->nullable();
            $table->json('specifications')->nullable();
            $table->string('sku', 100)->nullable()->unique();
            $table->integer('warranty_months')->default(12);
            $table->decimal('weight', 8, 2)->nullable();
            $table->timestamps();
            $table->softDeletes();
            
            $table->index(['status', 'stock']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};