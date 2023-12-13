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
        Schema::create('selected_laundry_items', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('laundry_order_id');
            $table->string('name');
            $table->integer('quantity');
            $table->timestamps();

            $table->foreign('laundry_order_id')->references('id')->on('laundry_orders');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('selected_laundry_items');
    }
};
