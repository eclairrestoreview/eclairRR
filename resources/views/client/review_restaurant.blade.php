@extends('client.layout')

@section('content')
<!--================Banner Area =================-->
<section class="banner_area">
  <div class="container">
    <div class="banner_text_inner">
      <h4>Review {{ $restaurant['name'] }}</h4>
      <ul>
        <li><a href="{{ URL::route('client-index') }}"><i class="fa fa-file" aria-hidden="true"></i>Home</a></li>
        <li><a href="#"><i class="fa fa-angle-right" aria-hidden="true"></i>{{ $restaurant['name'] }}</a></li>                    
      </ul>
    </div>
  </div>
</section>
<!--================End Banner Area =================-->

<!--================Static Area =================-->
<section class="static_area">
<div class="container">
    <div class="static_inner">
        <div class="row">
            <div class="col-lg-9">
                <div class="static_main_content">
                    <div class="static_img">
                        <img class="img-fluid" src="{{ URL::asset('storage/restaurant_img/' . $restaurant['name']) }}" alt="">
                    </div>
                    <div class="static_text">
                        <p style="word-break: break-all">Price: Rp {{ number_format($restaurant['price_bottom'], 2) }} - Rp {{ number_format($restaurant['price_top'], 2) }}</p>
                        <p style="word-wrap: break-word;">{{ $restaurant['desc'] }}</p>
                    </div>
                </div>
                <hr>
                <div class="row">
                    @if ($review->count() <= 0)
                    <div class="col-sm-12">
                        Review not found!
                    </div>
                    @endif
                    @if ($review->count() > 0)
                    @foreach($review as $rev)
                    <div class="col-sm-12">
                        <div class="l_news_item">
                            <div class="l_news_content">
                                <i class="fa fa-birthday-cake" aria-hidden="true"></i> {{ $rev['rating'] }}
                                <h4>{{ $rev['name'] }}</h4>
                                <span style="word-break: break-all">{{ $rev['email'] }}</span>
                                <p style="word-break: break-all">{{ $rev['review'] }}</p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    @endif
                    <hr>
                    <div>&nbsp</div>
                    <div class="col-sm-12">
                        <div class="contact_form">
                            <div class="main_title">
                                <h2>Add Review</h2>
                            </div>
                            <form class="contact_us_form row" id="reviewForm" novalidate="novalidate">
                                <div class="form-group col-lg-12">
                                    <input type="hidden" class="form-control" id="restaurant_id" name="restaurant_id" value="{{ $restaurant['restaurant_id'] }}">
                                </div>
                                <div class="form-group col-lg-12">
                                    <input type="text" class="form-control" id="name" name="name" placeholder="Name">
                                </div>
                                <div class="form-group col-lg-12">
                                    <input type="email" class="form-control" id="email" name="email" placeholder="Email">
                                </div>
                                <div class="form-group col-lg-12">
                                    <textarea class="form-control" id="review" name="review" placeholder="Review" rows="6"></textarea>
                                </div>
                                <div class="stars">
                                    <input type="radio" name="star" class="star-1" id="star-1" value="1" />
                                    <label class="star-1" for="star-1">1</label>
                                    <input type="radio" name="star" class="star-2" id="star-2" value="2"/>
                                    <label class="star-2" for="star-2">2</label>
                                    <input type="radio" name="star" class="star-3" id="star-3" value="3"/>
                                    <label class="star-3" for="star-3">3</label>
                                    <input type="radio" name="star" class="star-4" id="star-4" value="4"/>
                                    <label class="star-4" for="star-4">4</label>
                                    <input type="radio" name="star" class="star-5" id="star-5" value="5"/>
                                    <label class="star-5" for="star-5">5</label>
                                    <span></span>
                                </div>
                                <div class="form-group col-md-12">
                                    <button type="submit" value="submit" class="btn submit_btn2 form-control">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="right_sidebar_area">
                    <aside class="right_widget r_news_widget">
                        <div class="r_w_title">
                            <h3>Recent Review</h3>
                        </div>
                        <div class="news_inner">
                            @foreach($listRestaurant as $restaurant)
                            <div class="news_item">
                                <a href="{{ URL::route('client-review', $restaurant['restaurant_id']) }}"><h4>{{ $restaurant['name'] }}</h4></a>
                                <a href=""><h6>{{ $restaurant['created_at'] }}</h6></a>
                            </div>
                            @endforeach
                        </div>
                    </aside>
                </div>
            </div>
        </div>
    </div>
</div>
</section>
<!--================End Static Area =================-->
@endsection

@section('script')
<script src="{{ URL::asset('js/insertReview.js') }}"></script>
@endsection