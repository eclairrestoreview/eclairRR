<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class DashboardController extends Controller
{
    public function index()
    {
        $about = DashboardController::getAbout();
        $info = DashboardController::getMemberInformation();
        $title = DashboardController::getHomeTitle();
        $contact = DashboardController::getContact();
        $data = array(
            'about' => $about,
            'title' => $title,
            'contact' => $contact,
            'info' => $info
        );
        return view('dashboard.dashboard')
            ->with($data);
    }

    public function updateAbout(Request $request) 
    {
        $about = $request->get('about');
        return DB::select(DB::raw("UPDATE about
            SET about.about = '$about'
            WHERE about.about_id = 1;
        "));
    }

    public function updateMemberInformation(Request $request) 
    {
        $info = $request->get('information');
        return DB::select(DB::raw("UPDATE member_information
            SET member_information.information = '$info'
            WHERE member_information.information_id = 1;
        "));
    }

    public function updateHomeTitle(Request $request) 
    {
        $title = $request->get('title');
        return DB::select(DB::raw("UPDATE home_title
            SET home_title.title = '$title'
            WHERE home_title.id = 1;
        "));
    }
    
    public function updateContact(Request $request) 
    {
        $email = $request->get('email');
        $pn = $request->get('phone_number');
        $addr = $request->get('address');
        return DB::select(DB::raw("UPDATE contact
            SET contact.email = '$email',
                contact.phone_number = '$pn',
                contact.address = '$addr'
            WHERE contact.contact_id = 1;
        "));
    }

    public static function getAbout() 
    {
        return DB::table('about')->where('about_id', '=', 1)->first();
    }

    public static function getMemberInformation() 
    {
        return DB::table('member_information')->where('information_id', '=', 1)->first();
    }

    public static function getHomeTitle() 
    {
        return DB::table('home_title')->where('id', '=', 1)->first();
    }
    
    public static function getContact() 
    {
        return DB::table('contact')->where('contact_id', '=', 1)->first();
    }
}