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
        Schema::create('shipping_companies', function (Blueprint $table) {
            $table->id(); // bigint(20) UNSIGNED AUTO_INCREMENT
            $table->string('CompanyName', 255);
            $table->string('ContactPerson', 255);
            $table->string('ContactNumber', 20);
            $table->string('AlternativeNumber', 20)->nullable();
            $table->string('Email', 255);
            $table->string('Website', 255)->nullable();
            $table->text('Address');
            $table->string('City', 100);
            $table->string('Country', 100);
            $table->decimal('ShippingCost', 10, 2);
            $table->decimal('ExtraCostPerKG', 10, 2)->default(0.00);
            $table->string('EstimatedDeliveryTime', 50);
            $table->string('TrackingURL', 255)->nullable();
            $table->text('ServiceCoverage')->nullable();
            $table->text('PaymentMethods');
            $table->tinyInteger('Status', false, true)->default(1); // tinyint(1) default 1
            $table->timestamp('CreatedAt')->useCurrent();
            $table->timestamp('UpdatedAt')->useCurrent()->useCurrentOnUpdate();
        });
    }
    public function down(): void
    {
        Schema::dropIfExists('shipping_companies');
    }
};
