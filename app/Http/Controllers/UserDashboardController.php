<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\ModelController\UserController;
use App\Http\Controllers\ModelController\GetPromotionController;

class UserDashboardController extends Controller
{
    public function index()
    {
        return view('dashboard.list_member');
    }

    public function getListMember() {
        return UserController::getAllUser();
    }

    public function destroy(Request $request) {
        GetPromotionController::destroyByUser($request->input('user_id'));
        return UserController::destroy();
    }
}
