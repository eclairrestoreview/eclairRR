<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TriggerRating extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared('
        CREATE TRIGGER trigger_rating_insert AFTER INSERT
            ON review 
            FOR EACH ROW 
            BEGIN
                SET @new_rating = NEW.rating;
                SET @restaurant_id = NEW.restaurant_id;
                SET @rating_restaurant = (SELECT rating FROM restaurant WHERE restaurant.restaurant_id = @restaurant_id);
                SET @counter_rating = (SELECT counter_rating FROM restaurant WHERE restaurant.restaurant_id = @restaurant_id);
                SET @rating_total = ((@rating_restaurant * @counter_rating) + @new_rating) / (@counter_rating + 1);

                UPDATE restaurant
                SET restaurant.rating = @rating_total,
                    restaurant.counter_rating = @counter_rating + 1
                WHERE restaurant.restaurant_id = @restaurant_id;
                
            END;');
        
        DB::unprepared('
        CREATE TRIGGER trigger_rating_delete AFTER DELETE
            ON review 
            FOR EACH ROW 
            BEGIN
                SET @old_rating = OLD.rating;
                SET @restaurant_id = OLD.restaurant_id;
                SET @rating_restaurant = (SELECT rating FROM restaurant WHERE restaurant.restaurant_id = @restaurant_id);
                SET @counter_rating = (SELECT counter_rating FROM restaurant WHERE restaurant.restaurant_id = @restaurant_id);
                SET @rating_total = ((@rating_restaurant * @counter_rating) - @old_rating) / (@counter_rating - 1);

                UPDATE restaurant
                SET restaurant.rating = @rating_total,
                    restaurant.counter_rating = @counter_rating - 1
                WHERE restaurant.restaurant_id = @restaurant_id;
                
            END;');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared('DROP TRIGGER IF EXISTS trigger_rating_insert');
        DB::unprepared('DROP TRIGGER IF EXISTS trigger_rating_delete');
    }
}
