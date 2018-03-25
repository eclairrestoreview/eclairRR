<?php

namespace App\Http\Controllers\ModelController;

use Carbon\Carbon;
use App\Restaurant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use DB;

class RestaurantController extends Controller
{
    public static function store(Request $request)
    {
        $restaurant = new Restaurant($request->all());
        if ($request->file('img_url')->isValid()) {
            $request->file('img_url');
            // return Storage::putFile('public/voucher_img', $request->file('img_url'));
            $path = $request->file('img_url')->storeAs(
                'public/restaurant_img/', $restaurant->name
            );
        }
        $current = Carbon::now();
        return Restaurant::Create($request->all());
    }

    public static function update(Request $request)
    {
        try {
            $restaurant_id = $request->get('pk');
            $name = $request->get('name');
            $value = $request->get('value');
            $results = DB::select(DB::raw("UPDATE restaurant
                SET restaurant.$name = '$value'
                WHERE tabel_potongan.restaurant_id = $restaurant_id;
            "));
            return $request;
        } catch(\Exception $e){
            // do task when error
            return $e->getMessage();   // insert query
        }
    }

    public static function destroy($restaurant_id)
    {
        return DB::table('restaurant')->where('restaurant_id', '=', $restaurant_id)->delete();
    }

    public static function getAllRestaurant() {
        $restaurant = Restaurant::All();
        return $restaurant->toArray();
    }

    public static function getRestaurantById($restaurant_id)
    {
        return Restaurant::All()->where('restaurant_id', $restaurant_id)->first()->toArray();
    }

    public static function getLimitRestaurant()
    {
        return Restaurant::orderBy('restaurant_id','DESC')->limit(6)->get();
    }

    public static function getSearchRestaurant($keywoard)
    {
        $searchValues = preg_split('/\s+/', $keywoard, -1, PREG_SPLIT_NO_EMPTY); 

        return Restaurant::where(function ($q) use ($searchValues) {
            foreach ($searchValues as $value) {
                $q->orWhere('name', 'like', "%{$value}%");
            }
        })->get();
    }

    public static function getLimitRestaurantByCondition($restaurant_id)
    {
        try 
        {
            return DB::select(DB::raw("SELECT *
                FROM restaurant
                WHERE restaurant_id < $restaurant_id
                ORDER BY restaurant_id DESC
                LIMIT 6;
            "));
        } catch(\Exception $e){
            // do task when error
            return $e->getMessage();   // insert query
        }
    }

    public static function getLimitByOrder($order)
    {
        if($order === 'asc')
        {
            return Restaurant::orderBy('price_bottom','ASC')->limit(6)->get();
        }
        else
        {
            return Restaurant::orderBy('price_top','DESC')->limit(6)->get();
        }
    }

    public static function getLimitRestaurantByOrder($restaurant_id, $order, $counter)
    {
        try 
        {
            $lower = $counter * 6;
            if($order === 'asc')
            {
                return DB::select(DB::raw("SELECT *
                    FROM restaurant
                    ORDER BY price_bottom ASC
                    LIMIT $lower, 6;
                "));
            }
            else
            {
                return DB::select(DB::raw("SELECT *
                    FROM restaurant
                    ORDER BY price_top DESC
                    LIMIT $lower, 6;
                "));
            }
        } catch(\Exception $e){
            // do task when error
            return $e->getMessage();   // insert query
        }
    }
}
