<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vendor_bussiness_details', function (Blueprint $table) {
            $table->id();
            $table->integer('vendor_id');
            $table->string('sname');
            $table->string('saddress');
            $table->string('scity');
            $table->string('sstate');
            $table->string('scountry');
            $table->string('spincode');
            $table->string('smobile');
            $table->string('swebsite');
            $table->string('semail');
            $table->string('address_proof');
            $table->string('address_proof_image');
            $table->string('bussiness_license_number');
            $table->string('gst_number');
            $table->string('pan_number');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vendor_bussiness_details');
    }
};
