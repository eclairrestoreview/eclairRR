<?php

use Illuminate\Database\Seeder;

class RestaurantTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($idx = 0; $idx < 100; $idx++) {
            DB::table('restaurant')->insert([
                'name' => str_random(10),
                'address' => str_random(20),
                'city' => str_random(7),
                'phone_number' => str_random(12),
                'desc' => str_random(500),
                'price_bottom' => rand(100000, 2000000),
                'price_top' => rand(100000, 2000000),
                'img_url' => str_random(12).'.png',
                'rating' => rand(0, 5),
                'counter_rating' => rand(0, 100)
            ]);
        }
    }
}
