<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\ModelController\RestaurantController;
use App\Http\Controllers\ModelController\VoucherController;
use App\Http\Controllers\ModelController\ReviewController;
use App\Http\Controllers\ModelController\GetPromotionController;
use App\Http\Controllers\ModelController\TopRestaurantController;

class RestaurantDashboardController extends Controller
{
    public function index()
    {
        return view('dashboard.list_restaurant');
    }

    public function store(Request $request)
    {
        return RestaurantController::store($request);
    }

    public function update(Request $request)
    {
        return RestaurantController::update($request);
    }

    public function destroy(Request $request) {
        TopRestaurantController::destroy($request->input('restaurant_id'));
        GetPromotionController::destroyByRestaurant($request->input('restaurant_id'));
        VoucherController::destroyByRestaurant($request->input('restaurant_id'));
        ReviewController::destroyByRestaurant($request->input('restaurant_id'));
        return RestaurantController::destroy($request->input('restaurant_id'));
        // return $request;
    }

    public function getListRestaurant() {
        return RestaurantController::getAllRestaurant();
    }
}
