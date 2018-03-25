<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use App\Http\Controllers\ModelController\ReviewController;
use App\Http\Controllers\ModelController\RestaurantController;

class ReviewClientController extends Controller
{
    public function index($restaurant_id) {
        $contact = DB::table('contact')->where('contact_id', '=', 1)->first();
        $listRestaurant = RestaurantController::getLimitRestaurant();
        $restaurant = RestaurantController::getRestaurantById($restaurant_id);
        $review = ReviewController::getAllReviewByRestaurant($restaurant_id);
        $data = array(
            'restaurant' => $restaurant,
            'listRestaurant' => $listRestaurant,
            'review' => $review,
            'contact' => $contact
        );
        return view('client.review_restaurant')
            ->with($data);
    }

    public function store(Request $request)
    {
        return ReviewController::store($request);
    }
}
