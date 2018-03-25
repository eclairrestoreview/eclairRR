<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Voucher extends Migration
{
    public function up()
    {
        Schema::create('voucher', function (Blueprint $table) {
            $table->string('code');
            $table->string('name');
            $table->integer('restaurant_id')->unsigned();
            $table->text('description');
            $table->string('valid_from');
            $table->string('valid_until');
            $table->string('img_url')->nullable();
            $table->timestamps();
            $table->primary('code');
        });
        Schema::table('voucher', function($table) {
            $table->foreign('restaurant_id')->references('restaurant_id')->on('restaurant');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('voucher');
    }
}