<?php

namespace App\Http\Controllers\ModelController;

use DB;
use App\Voucher;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;

class VoucherController extends Controller
{
    public static function store(Request $request)
    {
        // return $request;
        $voucher = new Voucher($request->all());
        if ($request->file('img_url')->isValid()) {
            $request->file('img_url');
            // return Storage::putFile('public/voucher_img', $request->file('img_url'));
            $path = $request->file('img_url')->storeAs(
                'public/voucher_img', $voucher->code
            );
        }
        $current = Carbon::now();
        return DB::select(DB::raw("INSERT INTO voucher
            VALUE(
                '$voucher->code',
                '$voucher->name',
                $voucher->restaurant_id,
                '$voucher->description',
                '$voucher->valid_from',
                '$voucher->valid_until',
                '$voucher->code',
                '$current',
                '$current');
            "));
    }

    public static function destroy($code)
    {
        return DB::table('voucher')->where('code', '=', $code)->delete();
    }

    public static function destroyByRestaurant($restaurant_id)
    {
        $voucher = Voucher::where('restaurant_id', '=', $restaurant_id)->first();
        if ($voucher === null) {
            return "No Record";
        } else {
            return DB::table('voucher')->where('restaurant_id', '=', $restaurant_id)->delete();
        }     
        
    }

    public static function getAllVoucher() 
    {
        $voucher = Voucher::All();
        return $voucher->toArray();
    }

    public static function getAllVoucherByRestaurant($restaurant_id) 
    {
        return Voucher::All()->where('restaurant_id', $restaurant_id)->toJson();
    }

    public static function getVoucherByCode($code) 
    {
        $voucher = DB::select(DB::raw("SELECT voucher.code, voucher.name AS voucher_name, restaurant.name AS retaurant_name 
            FROM voucher JOIN restaurant ON voucher.restaurant_id = restaurant.restaurant_id
            WHERE voucher.code = '$code' LIMIT 1;
        "));
        $voucher = array_map(function ($value) {
            return (array)$value;
        }, $voucher);
        return $voucher[0];
    }
}