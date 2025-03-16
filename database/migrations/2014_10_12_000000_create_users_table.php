<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->uuid('role_id');
            $table->string('password');
            $table->string('created_by')->nullable();
            $table->rememberToken();
            $table->timestamps();
            $table->foreign('role_id')->references('id')->on('roles');
        });
        //akun admin modifikasi email dan password sesuai kebutuhan
        DB::table('users')->insert([
            [
                'id' => (string) Str::uuid(),
                'name' => 'admin',
                'email' => 'admin@mail.com',
                'password' => Hash::make('admin'),
                'role_id' => '798b0c6d-3dc4-4503-b938-fea49a097fbd'
            ],
            [
                'id' => (string) Str::uuid(),
                'name' => 'user',
                'email' => 'user@mail.com',
                'password' => Hash::make('user'),
                'role_id' => '45d434c0-76e0-4449-9cc5-ed57774b6cfe'
            ]
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
