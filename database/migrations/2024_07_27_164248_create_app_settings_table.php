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

        //create table
        Schema::create('app_settings', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('app_values');
            $table->string('app_category');
            $table->timestamps();
        });

        //configuration wajib, sesuiakan dengan kebutuhan
        DB::table('app_settings')->insert([
            [
                'id'=> (string) Str::uuid(),
                'app_values' => 'Rental PS',
                'app_category' => 'seo meta description',
                'created_at' => now(),
            ],
            [
                'id'=> (string) Str::uuid(),
                'app_values' => 'Rental, PS, Rental PS terbaik, Rental PS murah, Rental PS terpercaya',
                'app_category' => 'seo meta keywords',
                'created_at' => now(),
            ],
            [
                'id'=> (string) Str::uuid(),
                'app_values' => 'Angga Fantiya Hermawan',
                'app_category' => 'seo meta author',
                'created_at' => now(),
            ],
            [
                'id'=> (string) Str::uuid(),
                'app_values' => 'Rental PS ',
                'app_category' => 'seo meta title',
                'created_at' => now(),
            ],
            [
                'id'=> (string) Str::uuid(),
                'app_values' => 'assets/images/favicon.png',
                'app_category' => 'app favicon',
                'created_at' => now(),
            ],
            [
                'id'=> (string) Str::uuid(),
                'app_values' => 'Rental PS',
                'app_category' => 'app name',
                'created_at' => now(),
            ],
            [
                'id'=> (string) Str::uuid(),
                'app_values' => 'Angga Fantiya Hermawan',
                'app_category' => 'author',
                'created_at' => now(),
            ],

        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('app_settings');
    }
};
