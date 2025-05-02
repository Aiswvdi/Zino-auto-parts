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
        Schema::create('returns', function (Blueprint $table) {
            $table->id(); // bigint(20) UNSIGNED AUTO_INCREMENT
            $table->unsignedBigInteger('OrderID');
            // $table->unsignedBigInteger('productID');
            $table->text('returnReason')->nullable();
            $table->timestamp('returnDate')->useCurrent();
            $table->decimal('refundAmount', 10, 0);
            $table->timestamp('CreatedAt')->useCurrent();
            $table->timestamp('UpdatedAt')->useCurrent()->useCurrentOnUpdate();

            $table->foreign('OrderID')->references('id')->on('orders')->onDelete('cascade');
            // $table->foreign('productID')->references('productID')->on('products')->onDelete('cascade');
        });
    }
    public function down(): void
    {
        Schema::dropIfExists('returns');
    }
};
