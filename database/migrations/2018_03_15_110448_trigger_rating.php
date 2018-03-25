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
        CREATE OR REPLACE FUNCTION update_rating() RETURNS TRIGGER
            AS $update_rating$
        DECLARE
            new_rating          integer;
            restaurant_id       integer;
            rating_restaurant   integer;
            counter_rating      integer;
            rating_total        integer;
        BEGIN
            IF (TG_OP = "DELETE") THEN
                new_rating = OLD.rating;
                restaurant_id = OLD.restaurant_id;
                rating_restaurant = (SELECT rating FROM restaurant WHERE restaurant.restaurant_id = restaurant_id);
                counter_rating = (SELECT counter_rating FROM restaurant WHERE restaurant.restaurant_id = restaurant_id);
                rating_total = ((rating_restaurant * counter_rating) - old_rating) / (counter_rating - 1);

                UPDATE restaurant
                SET restaurant.rating = rating_total,
                    restaurant.counter_rating = counter_rating - 1
                WHERE restaurant.restaurant_id = restaurant_id;
            ELSIF (TG_OP = "INSERT") THEN
                new_rating = NEW.rating;
                restaurant_id = NEW.restaurant_id;
                rating_restaurant = (SELECT rating FROM restaurant WHERE restaurant.restaurant_id = restaurant_id);
                counter_rating = (SELECT counter_rating FROM restaurant WHERE restaurant.restaurant_id = restaurant_id);
                rating_total = ((rating_restaurant * counter_rating) + new_rating) / (counter_rating + 1);

                UPDATE restaurant
                SET restaurant.rating = rating_total,
                    restaurant.counter_rating = counter_rating + 1
                WHERE restaurant.restaurant_id = restaurant_id;
            END IF;
            RETURN NULL;

        END;
        $update_rating$ LANGUAGE plpgsql;');
        DB::unprepared('
        CREATE TRIGGER update_rating AFTER INSERT OR DELETE
            ON review 
            EXECUTE PROCEDURE update_rating();');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared('DROP TRIGGER IF EXISTS update_rating');
        DB::unprepared('DROP FUNCTION IF EXISTS update_rating');
    }
}
