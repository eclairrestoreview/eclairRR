<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use App\Http\Controllers\ModelController\UserController;
use App\Http\Controllers\ModelController\VoucherController;
use App\Http\Controllers\ModelController\GetPromotionController;

class PromoController extends Controller
{
    public function index()
    {
        $contact = DB::table('contact')->where('contact_id', '=', 1)->first();
        $listVoucher = VoucherController::getAllVoucher();
        $data = array(
            'listVoucher' => $listVoucher,
            'contact' => $contact
        );
        return view('client.promo')
            ->with($data);
    }

    public function checkAttribute($email)
    {
        return UserController::checkAttribute($email);
    }

    public function checkIsGetPromo($email, $code)
    {
        return GetPromotionController::checkAttribute($email, $code);
    }
}
