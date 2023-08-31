<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VendorBussinessDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('vendor_bussiness_details')->insert([
         
          'vendor_id' => 1,
          'sname' => 'john electronic shop',
          'saddress' => 'california h-block',
          'scity' => 'los angelus',
          'sstate' => 'california',
          'scountry' => 'united states',
          'spincode' => '12345',
          'smobile' => '0839839',
          'swebsite' => 'laravel.com',
          'semail' => 'john@gmail.com',
          'address_proof' => 'passport',
          'address_proof_image' => 'test.jpg', 
          'bussiness_license_number' => '00001',
          'gst_number' => '22222',
          'pan_number' => '784378',

        ]);
    }
}
