@extends('client.layout')

@section('content')
<!--================Banner Area =================-->
<section class="banner_area">
  <div class="container">
    <div class="banner_text_inner">
      <h4>Search Result</h4>
      <ul>
        <li><a href="{{ URL::route('client-index') }}"><i class="fa fa-home" aria-hidden="true"></i>Home</a></li>
        <li><a href="#"><i class="fa fa-angle-right" aria-hidden="true"></i>Search</a></li>                    
      </ul>
    </div>
  </div>
</section>
<!--================End Banner Area =================-->

<!--================Latest News Area =================-->
<section class="latest_news_area p_100">
    <div class="container">
        <div class="b_center_title">
            <h2>Restaurant Review</h2>
            <p>Search result for review restaurant</p>
        </div>
        <div class="l_news_inner">
            <div class="row">
            @if ($listRestaurant->count() <= 0)
              <div style="margin: auto">
                Retaurant Not Found.
              </div>
            @endif
            @foreach($listRestaurant as $restaurant)
                <div class="col-lg-4 col-md-6">
                    <div class="l_news_item">
                        <div class="l_news_img"><a href="#"><img class="img-fluid" src="{{ URL::asset('storage/restaurant_img/' . $restaurant['name']) }}" alt=""></a></div>
                        <div class="l_news_content">
                            <i class="fa fa-birthday-cake" aria-hidden="true"></i> {{ $restaurant['rating'] }}
                            <a href="{{ URL::route('client-review', $restaurant['restaurant_id']) }}"><h4>{{ $restaurant['name'] }}</h4></a>
                            <p style="word-break: break-all">{{  substr(strip_tags($restaurant->desc,'<pre>,<code>'),0,100) }}{{ strlen(strip_tags($restaurant->desc)) > 100 ? "..." : "" }}.</p>
                            <a class="more_btn" href="{{ URL::route('client-review', $restaurant['restaurant_id']) }}">Go to Review</a>
                        </div>
                    </div>
                </div>
            @endforeach
            </div>
        </div>
        
    </div>
</section>
<!--================End Latest News Area =================-->
@endsection

@section('script')
<script src="{{ URL::asset('js/homeLoader.js') }}"></script>
@endsection