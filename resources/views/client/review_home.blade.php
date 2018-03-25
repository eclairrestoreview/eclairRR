<!--================Latest News Area =================-->
<section class="latest_news_area p_100">
    <div class="container">
        <div class="b_center_title">
            <h2>Restaurant Review</h2>
            <p>We Are A Creative Digital Agency. Focused on Growing Brands Online</p>
        </div>
        <div class="dropdown" style="text-align: center;" >
            <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
            Sort By
            </button>
            <div class="dropdown-menu">
                <a class="dropdown-item" href="{{ URL::route('client-index') }}">None</a>
                <a class="dropdown-item" href="{{ URL::route('client-index', 'asc') }}">Low Price</a>
                <a class="dropdown-item" href="{{ URL::route('client-index', 'desc') }}">High Price</a>
            </div>
        </div>
        <div>&nbsp</div>
        <div class="l_news_inner">
            <div class="row" id="load-data">
            @if ($listRestaurant->count() <= 0)
                <div class="col-sm-12">
                    Resto not found!
                </div>
            @endif
            @if ($listRestaurant->count() > 0)
                @foreach($listRestaurant as $restaurant)
                    <div class="col-lg-4 col-md-6">
                        <div class="l_news_item">
                            <div class="l_news_img"><a href="#"><img class="img-fluid" src="{{ URL::asset('storage/restaurant_img/' . $restaurant['name']) }}" alt=""></a></div>
                            <div class="l_news_content">
                                <i class="fa fa-birthday-cake" aria-hidden="true"></i> {{ $restaurant['rating'] }}
                                <a href="{{ URL::route('client-review', $restaurant['restaurant_id']) }}"><h4>{{ $restaurant['name'] }}</h4></a>
                                <p style="word-break: break-all">Price: Rp {{ number_format($restaurant['price_bottom'], 2) }} - Rp {{ number_format($restaurant['price_top'], 2) }}</p>
                                <p style="word-break: break-all">{{  substr(strip_tags($restaurant->desc,'<pre>,<code>'),0,100) }}{{ strlen(strip_tags($restaurant->desc)) > 100 ? "..." : "" }}.</p>
                                <a class="more_btn" href="{{ URL::route('client-review', $restaurant['restaurant_id']) }}">Go to Review</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
            @if ($listRestaurant->count() <= 5)
                <div id="remove-row" style="margin:auto">
                    <button id="btn-more" onclick="getLoadData()" data-counter="0" data-id="{{ $restaurant->restaurant_id }}"> Load More </button>
                </div>
            @endif
            </div>
        </div>
        
    </div>
</section>
<!--================End Latest News Area =================-->