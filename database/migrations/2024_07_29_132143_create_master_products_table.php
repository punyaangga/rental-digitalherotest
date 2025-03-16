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
        Schema::create('master_products', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('id_category');
            $table->string('ms_product_name');
            $table->text('ms_product_description')->nullable();
            $table->text('ms_product_image')->nullable();
            $table->text('ms_product_meta_description')->nullable();
            $table->text('ms_product_meta_keyword')->nullable();
            $table->enum('ms_product_status', ['0', '1'])->default('1'); // 0 = tidak aktif, 1 = aktif
            $table->uuid('created_by')->nullable();
            $table->timestamps();


        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('master_products');
    }
};
