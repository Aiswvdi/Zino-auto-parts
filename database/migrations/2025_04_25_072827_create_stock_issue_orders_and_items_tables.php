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
        Schema::create('stock_issue_orders', function (Blueprint $table) {
            $table->id();
            $table->string('issue_number')->unique();
            $table->date('issue_date');
            $table->string('issued_by');
            $table->string('approved_by')->nullable();
            $table->text('notes')->nullable();
            $table->timestamps();
        });

        Schema::create('stock_issue_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('stock_issue_order_id')->constrained('stock_issue_orders')->onDelete('cascade');
            $table->string('part_number');
            $table->string('column_number')->nullable();
            $table->string('shelf_number')->nullable();
            $table->string('part_type');
            $table->string('part_category');
            $table->integer('issued_quantity');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('stock_issue_items');
        Schema::dropIfExists('stock_issue_orders');
    }

};
