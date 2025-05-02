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
        Schema::create('shipment_tracking', function (Blueprint $table) {
            $table->id(); // bigint(20) UNSIGNED AUTO_INCREMENT
            $table->unsignedBigInteger('OrderID');
            $table->unsignedBigInteger('ShippingID');
            $table->enum('Status', ['Processing', 'Shipped', 'In Transit', 'Out for Delivery', 'Delivered', 'Failed'])->default('Processing');
            $table->string('CurrentLocation', 255);
            $table->dateTime('EstimatedDeliveryDate');
            $table->dateTime('ActualDeliveryDate')->nullable();
            $table->timestamp('CreatedAt')->useCurrent();
            $table->timestamp('UpdatedAt')->useCurrent()->useCurrentOnUpdate();


            $table->foreign('OrderID')->references('id')->on('orders')->onDelete('cascade');

            $table->foreign('ShippingID')->references('id')->on('shippings')->onDelete('cascade');
        });
    }
    public function down(): void
    {
        Schema::dropIfExists('shipment_tracking');
    }
};
