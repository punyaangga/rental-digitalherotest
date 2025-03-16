<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class MasterPriceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('master_prices')->insert([
            [
                'id' => '31e8ab17-712a-42e0-adc8-24473e76fc10',
                'id_categories'=>'fd4a2ce4-a444-4533-84b6-0e92ddc46167',
                'mp_price' => '30000',
                'mp_type_price' => 'Base rate',
                'mp_status' => '1',
                'created_at' => now(),

            ],
            [
                'id' => 'b0314a7c-66f9-4822-b6af-7605c791e696',
                'id_categories'=>'7b3c9063-e752-4cd4-90e4-65a0b40f1a54',
                'mp_price' => '40000',
                'mp_type_price' => 'Base rate',
                'mp_status' => '1',
                'created_at' => now(),

            ],
            [
                'id' => '0b7ab903-9aaf-4b80-8e60-b4d60699e8d9',
                'id_categories'=>null,
                'mp_price' => '50000',
                'mp_type_price' => 'Weekend surcharge',
                'mp_status' => '1',
                'created_at' => now(),

            ],
        ]);
    }
}
