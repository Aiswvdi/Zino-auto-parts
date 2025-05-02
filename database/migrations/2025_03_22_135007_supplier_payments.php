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
        Schema::create('supplier_payments', function (Blueprint $table) {
            $table->id('PaymentID')->unsigned();
            $table->unsignedBigInteger('SupplierID');
            $table->unsignedBigInteger('InvoiceID');
            $table->decimal('AmountPaid', 10, 2);
            $table->string('PaymentMethod', 50);
            $table->string('TransactionReference')->nullable();
            $table->dateTime('PaymentDate');
            $table->enum('Status', ['Pending', 'Completed', 'Failed'])->default('Pending');
            $table->text('Notes')->nullable();
            $table->timestamps(0);

            $table->foreign('SupplierID')->references('id')->on('suppliers')->onDelete('cascade');
            $table->foreign('InvoiceID')->references('id')->on('invoices')->onDelete('cascade');
        });
    }
    public function down(): void
    {
        Schema::dropIfExists('supplier_payments');
    }
};
