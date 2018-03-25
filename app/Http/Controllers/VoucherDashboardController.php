<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\ModelController\RestaurantController;
use App\Http\Controllers\ModelController\VoucherController;

class VoucherDashboardController extends Controller
{
    public function index()
    {
        $listRestaurant = RestaurantController::getAllRestaurant();
        return view('dashboard.voucher')
            ->with('listRestaurant', $listRestaurant);
    }

    public function store(Request $request)
    {
        return VoucherController::store($request);
    }

    public function destroy(Request $request)
    {
        return VoucherController::destroy($request->input('code'));       
    }

    public function getAllVoucherByRestaurant($restaurant_id)
    {
        return VoucherController::getAllVoucherByRestaurant($restaurant_id);
    }

    public function getRestaurantById($restaurant_id)
    {
        $restaurant = RestaurantController::getRestaurantById($restaurant_id);
        return view('dashboard.voucher_specific')
            ->with('restaurant', $restaurant);
    }
}
