<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categories')->insert([
            [
                'id' => 'fd4a2ce4-a444-4533-84b6-0e92ddc46167',
                'category_name' => 'PS4',
                'category_description' => 'PS4',
                'category_status' => '1',
                'created_at' => now(),

            ],
            [
                'id' => '7b3c9063-e752-4cd4-90e4-65a0b40f1a54',
                'category_name' => 'PS5',
                'category_description' => 'PS5',
                'category_status' => '1',
                'created_at' => now(),

            ],
        ]);
    }
}
