<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use App\Http\Controllers\ModelController\RestaurantController;

class SearchController extends Controller
{
    public function index($keywoard)
    {
        $contact = DB::table('contact')->where('contact_id', '=', 1)->first();
        $listRestaurant = RestaurantController::getSearchRestaurant($keywoard);
        $data = array(
            'listRestaurant' => $listRestaurant,
            'contact' => $contact
        );
        return view('client.search')
            ->with($data);
    }
}
