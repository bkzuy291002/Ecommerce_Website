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
        Schema::create('setup_stores', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('store_id');
            $table->integer('phone');
            $table->string('gender')->nullable();
            $table->string('name_store');
            $table->integer('city_id');
            $table->integer('district_id');
            $table->string('address_store');
            $table->string('image')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('setup_stores');
    }
};
