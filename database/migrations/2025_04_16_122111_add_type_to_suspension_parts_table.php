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
        Schema::table('suspension_parts', function (Blueprint $table) {
            $table->string('type')->nullable(); // إضافة عمود type
        });
    }

    public function down()
    {
        Schema::table('suspension_parts', function (Blueprint $table) {
            $table->dropColumn('type'); // حذف عمود type في حال التراجع عن المهاجرة
        });
    }

};
