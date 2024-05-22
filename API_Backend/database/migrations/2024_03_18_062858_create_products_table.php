<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->integer('store_id')->nullable();
            $table->integer('category_id')->nullable();
            $table->string('sku');
            $table->string('name');
            $table->string('slug');
            $table->double('price');
            $table->integer('discount')->nullable();
            $table->tinyInteger('discount_type')->default(1);
            $table->string('type')->default('Bình thường');
            $table->integer('published');
            $table->integer('quantity');
            $table->text('description');
            $table->string('brand')->nullable();
            $table->string('warranty')->nullable();
            $table->string('warranty_type')->nullable();
            $table->integer('city_id')->nullable();
            $table->boolean('special')->default(false);
            $table->text('draft')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
