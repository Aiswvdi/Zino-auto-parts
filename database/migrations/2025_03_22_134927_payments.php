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
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->dateTime('PaymentDate');
            $table->decimal('PaymentAmount', 10, 0);
            $table->enum('PaymentMethod', ['credit_card', 'paypal', 'bank_transfer', 'cash']);
            $table->enum('PaymentStatus', ['pending', 'completed', 'failed', 'refunded']);
            $table->unsignedBigInteger('OrderID');
            $table->string('PayerName', 255);
            $table->string('Currency', 255);
            $table->timestamp('CreatedAt')->useCurrent();
            $table->timestamp('UpdatedAt')->useCurrent()->useCurrentOnUpdate();
            $table->foreign('OrderID')->references('id')->on('orders')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
