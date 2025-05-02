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
        Schema::create('warehouses', function (Blueprint $table) {
            $table->id();
            $table->string('part_number')->unique();       // رقم القطعة
            $table->string('description');                 // وصف القطعة
            $table->string('car_name')->nullable();        // اسم السيارة ✅
            $table->string('car_model')->nullable();       // موديل السيارة
            $table->string('car_category')->nullable();    // فئة السيارة
            $table->string('product_type')->nullable();    // نوع المنتج ✅
            $table->string('manufacturer');                // الشركة المصنعة
            $table->date('purchase_date');                 // تاريخ الشراء
            $table->integer('quantity')->default(0);       // الكمية
            $table->decimal('purchase_price', 10, 2);      // سعر الشراء
            $table->decimal('sale_price', 10, 2);          // سعر البيع
            $table->string('image_path')->nullable();      // مسار الصورة
            $table->timestamps();                          // created_at و updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('warehouses');
    }
};
