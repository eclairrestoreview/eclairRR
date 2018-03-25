<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Review extends Migration
{
    public function up()
    {
        Schema::create('review', function (Blueprint $table) {
            $table->increments('review_id');
            $table->integer('restaurant_id')->unsigned();
            $table->string('name');
            $table->string('email');
            $table->text('review');
            $table->integer('rating');
            $table->timestamps();
        });
        Schema::table('review', function($table) {
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
        Schema::dropIfExists('review');
    }
}