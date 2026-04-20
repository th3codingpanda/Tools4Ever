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
        Schema::create('order', function (Blueprint $table) {
            $table->id('order_id');
            $table->unsignedBigInteger('product_id');
            $table->unsignedBigInteger('location_id');
            $table->decimal('buy_price',6,2);
            $table->decimal('sell_price',6,2);
            $table->integer('amount');
            $table->integer('minimum_amount');
            $table->timestamps();
            $table->date("delivery_date");
            $table->foreign('product_id')->references('product_id')->on('product');
            $table->foreign('location_id')->references('location_id')->on('location');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order');
    }
};
