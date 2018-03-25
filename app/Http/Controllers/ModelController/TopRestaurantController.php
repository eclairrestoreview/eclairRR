<?php

namespace App\Http\Controllers\ModelController;

use DB;
use App\TopRestaurant;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TopRestaurantController extends Controller
{
    public static function store(Request $request)
    {
        try
        {
            return TopRestaurant::Create($request->all());
        } catch(\Exception $e){
            // do task when error
            return $e->getMessage();   // insert query
        }
    }

    public static function destroy($restaurant_id)
    {
        $top_restaurant = TopRestaurant::where('restaurant_id', '=', $restaurant_id)->first();
        if ($top_restaurant === null) {
            return "No Record";
        } else {
            return DB::table('top_restaurant')->where('restaurant_id', '=', $restaurant_id)->delete();
        }
    }

    public static function getAllTopRestaurant() {
        // $restaurant = TopRestaurant::All();
        try
        {
            // $restaurant = 
            return DB::select(DB::raw("SELECT *
                FROM top_restaurant NATURAL JOIN restaurant;
            "));
            return $restaurant->toArray();
        } catch(\Exception $e){
            // do task when error
            return $e->getMessage();   // insert query
        }
    }
}
