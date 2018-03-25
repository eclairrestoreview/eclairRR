<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TopRestaurant extends Migration
{
    public function up()
    {
        Schema::create('top_restaurant', function (Blueprint $table) {
            $table->integer('restaurant_id')->unsigned();
        });
        Schema::table('top_restaurant', function($table) {
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
        Schema::dropIfExists('top_restaurant');
    }
}