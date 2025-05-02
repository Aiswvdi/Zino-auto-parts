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
        Schema::create('suppliers', function (Blueprint $table) {
            $table->id()->unsigned();
            $table->string('SupplierName');
            $table->string('ContactPerson');
            $table->string('PhoneNumber');
            $table->string('Email');
            $table->string('CompanyWebsite');
            $table->text('Address');
            $table->string('City');
            $table->string('Country');
            $table->timestamps(0); // This will create CreatedAt and UpdatedAt columns as timestamps
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('suppliers');
    }
};
