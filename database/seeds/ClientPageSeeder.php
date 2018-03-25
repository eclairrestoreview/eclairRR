<?php

use Illuminate\Database\Seeder;

class ClientPageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('about')->insert([
            'about' => str_random(255)
        ]);
        DB::table('member_information')->insert([
            'information' => str_random(255)
        ]);
        DB::table('home_title')->insert([
            'title' => str_random(30)
        ]);
        DB::table('contact')->insert([
            'email' => str_random(50),
            'address' => str_random(50),
            'phone_number' => str_random(12)
        ]);
    }
}
