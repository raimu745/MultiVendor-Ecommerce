<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
           'parent_id' => 0,
           'section_id' => 1,
           'cname' => 'kids',
           'cimage' => '',
           'cdiscount' => '0',
           'description' => '',
           'url' => 'kids',
           'meta_title' => '',
           'meta_description' => '',
           'meta_keyword' => '',
           'status' => 1,
        
        ]);
    }
}
