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
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->string('InvoiceNumber', 255);
            $table->enum('InvoiceType', ['sale', 'purchase', 'refund']);
            $table->unsignedBigInteger('CustomerID');
            $table->dateTime('InvoiceDate');
            $table->dateTime('DueDate');
            $table->enum('PaymentStatus', ['paid', 'pending', 'overdue', 'canceled']);
            $table->decimal('NetAmount', 10, 0);
            $table->decimal('TaxAmount', 10, 0);
            $table->decimal('DiscountAmount', 10, 0);
            $table->decimal('TotalAmount', 10, 0);
            $table->string('Currency', 255);
            $table->timestamp('CreatedAt')->useCurrent();
            $table->timestamp('UpdatedAt')->nullable()->useCurrentOnUpdate();
            $table->foreign('CustomerID')->references('id')->on('customers')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invoices');
    }
};
