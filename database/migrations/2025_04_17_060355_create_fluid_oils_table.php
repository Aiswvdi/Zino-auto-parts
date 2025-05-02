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
    Schema::create('fluid_oils', function (Blueprint $table) {
        $table->id();
        $table->string('name');
        $table->string('type')->nullable(); // مثل "زيت محرك" أو "ماء رديتر"
        $table->text('description')->nullable();
        $table->decimal('price', 10, 2)->nullable();
        $table->string('image')->nullable();
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fluid_oils');
    }
};
