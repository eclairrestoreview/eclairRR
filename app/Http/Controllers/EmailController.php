<?php

namespace App\Http\Controllers;

use DB;
use Mail;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\ModelController\UserController;
use App\Http\Controllers\ModelController\VoucherController;

class EmailController extends Controller
{
    public function getCode(Request $request)
    {
        $current = Carbon::now();
        $voucher = VoucherController::getVoucherByCode($request->input('code'));
        $code = $voucher['code'];
        $email = $request->input('email');
        $user = UserController::getUserByEmail($email);
        $data = array(
            'voucher' => $voucher,
            'email' => $email
        );
    
        try
        {
            $insert = DB::select(DB::raw("INSERT INTO get_promotion
            VALUE(
                $user->user_id,
                '$code',
                '$current',
                '$current');
            "));
            Mail::send('emails.email', $data, function($message) use ($email) {
    
                $message->from('eclairrestoreview@gmail.com', 'Get Promoion Code');
        
                $message->to($email)->subject('Get Promotion Code');
        
            });
        
        } catch(\Exception $e){
            // do task when error
            return $e->getMessage();   // insert query
        }
        
        return "Your email has been sent successfully";
    }
}
