<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class LoginController extends Controller
{
    public function index() {
        return view('dashboard.login');
    }

    public function login(Request $request) {
        $username = $request->get('username');
        $password = $request->get('password');

        if ($username === "eclair_admin")
        {
            if ($password === "eclair_admin")
            {
                $request->session()->put('username', $username);
                return redirect('/admin/dashboard');
            } else {
                return redirect('/admin');
            }
        } else {
            return redirect('/admin');
        }
    }

    public function logout(Request $request) {
        $request->session()->flush();
        return redirect('/admin');
    }
}
