<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index()
    {
        $about = DB::table('about')->where('about_id', '=', 1)->first();
        $contact = DB::table('contact')->where('contact_id', '=', 1)->first();
        $data = array(
            'about' => $about,
            'contact' => $contact,
        );
        return view('client.about')
            ->with($data);
    }
}
