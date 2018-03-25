@extends('client.layout')

@section('content')
<!--================Banner Area =================-->
<section class="banner_area">
  <div class="container">
    <div class="banner_text_inner">
      <h4>Partnership</h4>
      <ul>
        <li><a href="{{ URL::route('client-partnership') }}"><i class="fa fa-credit-card-blank" aria-hidden="true"></i>Partnership</a></li>
      </ul>
    </div>
  </div>
</section>
<!--================End Banner Area =================-->

<!--================Latest News Area =================-->
<section class="latest_news_area p_100">
    <div class="container">
        <div class="b_center_title">
            <h2>Partnership</h2>
            <p>Our partner that can be view</p>
        </div>
        <div class="l_news_inner">
            <div class="row" id="load-data">
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
                <div class="col-sm-12">&nbsp</div>
                <div id="remove-row" style="margin:auto">
                    <button id="btn-more" onclick="getLoadData()" data-id="{{ $restaurant->restaurant_id }}"> Load More </button>
                </div>
            </div>
        </div>
    </div>
</section>
<!--================End Latest News Area =================-->
@endsection

@section('script')
<script src="{{ URL::asset('js/homeLoader.js') }}"></script>
@endsection