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
        Schema::create('laundry_orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('laundry_id');
            $table->unsignedBigInteger('package_id');
            $table->string('statuspembayaran')->default('menunggu pembayaran');
            $table->timestamps();

            $table->foreign('laundry_id')->references('id')->on('laundries');
            $table->foreign('package_id')->references('id')->on('packages');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('laundry_orders');
    }
};
