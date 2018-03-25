<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\ModelController\RestaurantController;
use App\Http\Controllers\ModelController\ReviewController;

class ReviewDashboardController extends Controller
{
    public function index()
    {
        $listRestaurant = RestaurantController::getAllRestaurant();
        return view('dashboard.review')
            ->with('listRestaurant', $listRestaurant);
    }

    public function getAllReviewByRestaurant($restaurant_id)
    {
        return ReviewController::getAllReviewByRestaurant($restaurant_id);
    }

    public function getRestaurantById($restaurant_id)
    {
        $restaurant = RestaurantController::getRestaurantById($restaurant_id);
        return view('dashboard.review_specific')
            ->with('restaurant', $restaurant);
    }

    public function destroy(Request $request)
    {
        return ReviewController::destroy($request->input('review_id'));       
    }
}
