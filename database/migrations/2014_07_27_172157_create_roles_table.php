<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {

        //create table
        Schema::create('roles', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('name');
            $table->timestamps();
        });
        //configuration wajib untuk user role
        DB::table('roles')->insert([
            ['id' => '798b0c6d-3dc4-4503-b938-fea49a097fbd', 'name' => 'admin'],
            ['id' => '45d434c0-76e0-4449-9cc5-ed57774b6cfe', 'name' => 'user']
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('roles');
    }
};
