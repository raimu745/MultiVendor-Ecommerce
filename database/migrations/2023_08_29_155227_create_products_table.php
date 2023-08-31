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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->integer('section_id');
            $table->integer('category_id');
            $table->integer('brand_id');
            $table->integer('vendor_id');
            $table->string('admin_type');
            $table->string('pname');
            $table->string('pcode');
            $table->string('pcolor');
            $table->string('pprice');
            $table->string('pdiscount');
            $table->string('pweight');
            $table->string('pimage');
            $table->string('pvideo');
            $table->string('description');
            $table->string('meta_title');
            $table->string('meta_description');
            $table->string('meta_keyword');
            $table->enum('isfeatured',['no','yes']);
            $table->tinyInteger('status');
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
        Schema::dropIfExists('products');
    }
};
