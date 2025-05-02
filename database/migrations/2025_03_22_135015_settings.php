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
        Schema::create('settings', function (Blueprint $table) {
            $table->id(); // int(11) UNSIGNED AUTO_INCREMENT
            $table->unsignedBigInteger('UserID');
            $table->text('Value');
            $table->string('Key', 255);
            $table->timestamp('CreatedAt')->useCurrent();
            $table->timestamp('UpdatedAt')->useCurrent()->useCurrentOnUpdate();

            // ربط المفتاح الخارجي بجدول المستخدمين
            $table->foreign('UserID')->references('id')->on('users')->onDelete('cascade');
        });
    }
    public function down(): void
    {
        Schema::dropIfExists('settings');
    }
};
