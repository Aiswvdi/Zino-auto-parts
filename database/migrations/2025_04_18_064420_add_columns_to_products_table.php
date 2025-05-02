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
        Schema::table('products', function (Blueprint $table) {
            $table->string('car_category')->nullable()->after('supplierID');
            $table->string('car_brand')->nullable()->after('car_category');
            $table->string('car_model')->nullable()->after('car_brand');
            $table->string('product_brand')->nullable()->after('car_model');
            $table->boolean('is_original')->nullable()->after('product_brand'); // true = أصلي، false = تقليد
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn(['car_category', 'car_brand', 'car_model', 'product_brand', 'is_original']);
        });
    }
};
