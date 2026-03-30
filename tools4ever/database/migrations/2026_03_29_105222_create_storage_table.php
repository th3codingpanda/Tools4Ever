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
        Schema::create('storage', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->id('storage_id');
            $table->unsignedBigInteger('product_id');
            $table->unsignedBigInteger('location_id');
            $table->integer('amount');
            $table->integer('minimum_amount');
            $table->timestamps();
            $table->foreign('product_id')->references('product_id')->on('product');
            $table->foreign('location_id')->references('location_id')->on('location');
            $table->unique(['product_id', 'location_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('storage');
    }
};
