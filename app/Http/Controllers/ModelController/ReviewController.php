<?php

namespace App\Http\Controllers\ModelController;

use DB;
use App\Review;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ReviewController extends Controller
{
    public static function store(Request $request)
    {
        // return $request;
        $current = Carbon::now();
        $review = new Review($request->all());
        return Review::Create($request->all());
    }

    public static function destroy($review_id)
    {
        return DB::table('review')->where('review_id', '=', $review_id)->delete();
    }

    public static function destroyByRestaurant($restaurant_id)
    {
        $review = Review::where('restaurant_id', '=', $restaurant_id)->first();
        if ($review === null) {
            return "No Record";
        } else {
            return DB::table('review')->where('restaurant_id', '=', $restaurant_id)->delete();
        }
    }

    public static function getAllReview() {
        $review = Review::All();
        return $review->toArray();
    }

    public static function getAllReviewByRestaurant($restaurant_id) {
        return Review::where('restaurant_id','=', $restaurant_id)->get();
    }
}
