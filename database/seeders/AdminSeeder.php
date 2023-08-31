<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admins')->insert([
            'name'=> 'john',
            'type'=> 'vendor',
            'vendor_id'=> 1,
            'mobile'=> '0330030330',
            'email'=> 'john@gmail.com',
            'password' => Hash::make('john'),
            'image' => '',
            'role' => 0
        ]);
    }
}
