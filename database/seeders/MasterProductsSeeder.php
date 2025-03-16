<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class MasterProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('master_products')->insert([
            [
                'id'=>str::uuid(),
                'id_category' => 'fd4a2ce4-a444-4533-84b6-0e92ddc46167',
                'ms_product_name' => 'Sonny Playstation 4',
                'ms_product_description' => 'Di PS ini tersedia game GTA 5, FIFA 21, PES 2021, dan lain-lain',
                'ms_product_image' => 'assets/images/landingPage/product-thumb-1.png',
                'ms_product_meta_description' => 'Di PS ini tersedia game GTA 5, FIFA 21, PES 2021, dan lain-lain',
                'ms_product_meta_keyword' => 'PS, GTA 5, FIFA 21, PES 2021',
                'ms_product_status' => '1',

                'created_at' => now(),
            ],
            [
                'id'=>str::uuid(),
                'id_category' => '7b3c9063-e752-4cd4-90e4-65a0b40f1a54',
                'ms_product_name' => 'Sonny Playstation 5',
                'ms_product_description' => 'Di PS ini tersedia game GTA 5, FIFA 21, PES 2021, dan lain-lain',
                'ms_product_image' => 'assets/images/landingPage/product-thumb-1.png',
                'ms_product_meta_description' => 'Di PS ini tersedia game GTA 5, FIFA 21, PES 2025, dan lain-lain',
                'ms_product_meta_keyword' => 'PS, GTA 5, FIFA 21, PES 2025',
                'ms_product_status' => '1',

                'created_at' => now(),
            ],
        ]);

    }
}
