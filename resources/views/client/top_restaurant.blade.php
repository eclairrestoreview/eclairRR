<!--================Latest News Area =================-->
<section class="latest_news_area p_100">
    <div class="container">
        <div class="b_center_title">
            <h2>Top Restaurant</h2>
            <p>This week top restaurant</p>
        </div>
        <div class="l_news_inner">
            <div class="row">
            @foreach($topRestaurant as $restaurant)
                <div class="col-lg-4 col-md-6">
                    <div class="l_news_item">
                        <div class="l_news_img"><a href="{{ URL::route('client-review', (string)$restaurant->restaurant_id) }}"><img class="img-fluid" src="{{ URL::asset('storage/restaurant_img/' . $restaurant->name) }}" alt=""></a></div>
                        <div class="l_news_content">
                            <a href="{{ URL::route('client-review', (string)$restaurant->restaurant_id) }}"><h4>{{ $restaurant->name }}</h4></a>
                            <p style="word-break: break-all">{{  substr(strip_tags($restaurant->desc,'<pre>,<code>'),0,100) }}{{ strlen(strip_tags($restaurant->desc)) > 100 ? "..." : "" }}.</p>
                            <a class="more_btn" href="{{ URL::route('client-review', (string)$restaurant->restaurant_id) }}">Go to Review</a>
                        </div>
                    </div>
                </div>
            @endforeach
            </div>
        </div>
    </div>
</section>
<!--================End Latest News Area =================-->