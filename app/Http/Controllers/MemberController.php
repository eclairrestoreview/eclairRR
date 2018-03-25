<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use App\Http\Controllers\ModelController\UserController;

class MemberController extends Controller
{
    public function index()
    {
        $contact = DB::table('contact')->where('contact_id', '=', 1)->first();
        $info = DB::table('member_information')->where('information_id', '=', 1)->first();
        $data = array(
            'info' => $info,
            'contact' => $contact
        );
        return view('client.member')
            ->with($data);
    }

    public function store(Request $request)
    {
        return UserController::store($request);
    }
}
