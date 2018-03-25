<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Restaurant extends Migration
{
    public function up()
    {
        Schema::create('restaurant', function (Blueprint $table) {
            $table->increments('restaurant_id');
            $table->string('name');
            $table->string('address');
            $table->string('city');
            $table->string('phone_number');
            $table->text('desc');
            $table->bigInteger('price_bottom');
            $table->bigInteger('price_top');
            $table->string('img_url')->nullable();
            $table->float('rating', 3, 2)->default(0);
            $table->integer('counter_rating')->default(0);
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
        Schema::dropIfExists('restaurant');
    }
}