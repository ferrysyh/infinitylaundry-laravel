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
        Schema::create('transaction_histories', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('laundry_id');
            $table->unsignedBigInteger('package_id');
            $table->unsignedBigInteger('order_id');
            $table->string('statuspembayaran')->default('Menunggu pembayaran');
            $table->string('price')->default(0);
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('laundry_id')->references('id')->on('laundries');
            $table->foreign('package_id')->references('id')->on('packages');
            $table->foreign('order_id')->references('id')->on('laundry_orders');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaction_histories');
    }
};
