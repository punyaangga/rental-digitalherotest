<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;
return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('master_prices', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('id_categories')->nullable();
            $table->integer('mp_price');
            $table->enum('mp_type_price', ['Base rate', 'Weekend surcharge']);
            $table->enum('mp_status', ['0', '1'])->default('0'); // 0 = tidak aktif, 1 = aktif
            $table->uuid('created_by')->nullable();
            $table->timestamps();

        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('master_prices');
    }
};
