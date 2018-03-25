<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\ModelController\RestaurantController;
use App\Http\Controllers\ModelController\GetPromotionController;

class UserGetVoucherDashboardController extends Controller
{
    public function index()
    {
        $listRestaurant = RestaurantController::getAllRestaurant();
        return view('dashboard.member_voucher')
            ->with('listRestaurant', $listRestaurant);
    }

    public function getAllUserByRestaurant($restaurant_id)
    {
        return GetPromotionController::getAllUserByRestaurant($restaurant_id);
    }

    public function getRestaurantById($restaurant_id)
    {
        $restaurant = RestaurantController::getRestaurantById($restaurant_id);
        return view('dashboard.member_voucher_specific')
            ->with('restaurant', $restaurant);
    }

    public function destroy(Request $request, $restaurant_id)
    {
        return GetPromotionController::destroy($user_id, $restaurant_id);
    }
}
