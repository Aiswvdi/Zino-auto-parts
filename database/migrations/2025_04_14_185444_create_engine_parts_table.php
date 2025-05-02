<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('engine_parts', function (Blueprint $table) {
            $table->id();
            $table->string('name');                  // اسم القطعة
            $table->string('manufacturer');          // اسم الشركة المصنعة
            $table->decimal('price', 8, 2);          // السعر (مثلاً 99999.99 كحد أقصى)
            $table->text('description')->nullable(); // وصف القطعة
            $table->string('image')->nullable();    // رابط الصورة
            $table->timestamps();                    // created_at و updated_at
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('engine_parts');
    }
};
