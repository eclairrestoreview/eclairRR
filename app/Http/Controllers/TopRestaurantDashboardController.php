<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\ModelController\RestaurantController;
use App\Http\Controllers\ModelController\TopRestaurantController;

class TopRestaurantDashboardController extends Controller
{
    public function index()
    {
        $listRestaurant = RestaurantController::getAllRestaurant();
        return view('dashboard.top_restaurant')
            ->with('listRestaurant', $listRestaurant);
    }

    public function store(Request $request)
    {
        return TopRestaurantController::store($request);
    }

    public function destroy(Request $request)
    {
        return TopRestaurantController::destroy($request->input('restaurant_id'));
    }

    public function getAllTopRestaurant()
    {
        return TopRestaurantController::getAllTopRestaurant();
    }
}
