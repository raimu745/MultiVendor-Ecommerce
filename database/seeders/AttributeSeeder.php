<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AttributeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('attributes')->insert([
           'product_id' => 1 ,
           'size'  => 'large',
           'price'  => 5000,
           'stock'  => 30,
           'sku'  => 'ts003',
           'status'  => 1,

        ]);
    }
}
