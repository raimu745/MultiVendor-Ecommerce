<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VendorBankDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('vendor_bank_details')->insert([
        'vendor_id' => 1,
        'account_holder_name' => 'john',
        'bank_name' => 'bank al falah',
        'account_number' => '047424546',
        'bank_ifsc_code' => '0471'
        ]);
    }
}
