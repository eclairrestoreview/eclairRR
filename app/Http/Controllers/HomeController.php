<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use App\Http\Controllers\ModelController\RestaurantController;
use App\Http\Controllers\ModelController\TopRestaurantController;

class HomeController extends Controller
{
    public function index($order = null)
    {
        $contact = DB::table('contact')->where('contact_id', '=', 1)->first();
        $topRestaurant = TopRestaurantController::getAllTopRestaurant();
        if($order != null) 
        {
            $listRestaurant = RestaurantController::getLimitByOrder($order);
        } else 
        {
            $listRestaurant = RestaurantController::getLimitRestaurant();
        }
        $title = DB::table('home_title')->where('id', '=', 1)->first();
        $data = array(
            'topRestaurant' => $topRestaurant,
            'listRestaurant' => $listRestaurant,
            'title' => $title,
            'contact' => $contact 
        );
        return view('client.index')
            ->with($data);
    }
    
    public function loadDataAjax(Request $request)
    {
        $output = '';
        $restaurant_id = $request->restaurant_id;
        $counter = $request->counter;
        $counter++;
        $order = $request->order;

        
        
        if($order === 'asc' || $order === 'des')
        {
            $restaurant = RestaurantController::getLimitRestaurantByOrder($restaurant_id, $order, $counter);
        } else
        {
            $restaurant = RestaurantController::getLimitRestaurantByCondition($restaurant_id);
        }
        
        // return $restaurant;
        
        if(!empty($restaurant))
        {
            foreach($restaurant as $res)
            {
                $url = url('review/'.$res->name);
                $body = substr(strip_tags($res->desc),0,100);
                $body .= strlen(strip_tags($res->desc)) > 100 ? " ..." : "";
                                
                $output .= '<div class="col-lg-4 col-md-6">
                        <div class="l_news_item">
                            <div class="l_news_img"><a href="'.$url.'"><img class="img-fluid" src="storage/restaurant_img/'.$res->name.'" alt=""></a></div>
                            <div class="l_news_content">
                                <i class="fa fa-birthday-cake" aria-hidden="true"></i>'.$res->rating.'
                                <a href="'.$url.'"</h4>'.$res->name.'</a>
                                <p style="word-break: break-all">Price: Rp '.number_format($res->price_bottom, 2).' - Rp '.number_format($res->price_top, 2).'</p>
                                <p style="word-break: break-all">'.$body.'</p>
                                <a class="more_btn" href="'.$url.'">Go to Review</a>
                            </div>
                        </div>
                    </div>';
            }
            
            $output .= '<div id="remove-row" style="margin:auto">
                <button id="btn-more" onclick="getLoadData()" data-counter="'.$counter.'" data-id="'.$restaurant[5]->restaurant_id.'"> Load More </button>
            </div>';

            return $output;
        }
    }
}
