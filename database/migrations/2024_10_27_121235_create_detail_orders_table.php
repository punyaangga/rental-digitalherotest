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
        Schema::create('detail_orders', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('id_order')->nullable();
            $table->uuid('id_product')->nullable();
            $table->date('detail_order_date')->nullable();
            $table->time('detail_order_time_start')->nullable();
            $table->time('detail_order_time_end')->nullable();
            $table->integer('detail_order_price')->nullable();
            $table->uuid('created_by')->nullable();
            $table->enum('do_status', ['chart','checkout']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_orders');
    }
};
