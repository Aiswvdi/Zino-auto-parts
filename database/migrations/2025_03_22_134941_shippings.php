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
        Schema::create('shippings', function (Blueprint $table) {
            $table->id(); // int(11) UNSIGNED AUTO_INCREMENT
            $table->unsignedBigInteger('orderID');
            $table->string('trackingNumber', 255)->nullable();
            $table->string('carrier', 255)->nullable();
            $table->text('shippingAddress');
            $table->timestamp('shippingDate')->useCurrent();
            $table->timestamp('CreatedAt')->useCurrent();
            $table->timestamp('UpdatedAt')->useCurrent()->useCurrentOnUpdate();


            $table->foreign('orderID')->references('id')->on('orders')->onDelete('cascade');
        });
    }
    public function down(): void
    {
        Schema::dropIfExists('shippings');
    }
};
