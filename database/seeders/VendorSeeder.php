<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VendorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('vendors')->insert([
         'name' => 'john',
         'adress' => 'california d-block',
         'city' => 'loss angelus',
         'state' => 'california',
         'country' => 'united states',
         'pincode' => '12345',
         'mobile' => '0425645342',
         'email' => 'john@gmail.com',
         'status' => 0   

        ]);
    }
}
