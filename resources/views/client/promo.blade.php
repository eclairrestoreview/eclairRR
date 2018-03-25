@extends('client.layout')

@section('content')
<!--================Banner Area =================-->
<section class="banner_area">
  <div class="container">
    <div class="banner_text_inner">
      <h4>Promo Eclair</h4>
      <ul>
        <li><a href="{{ URL::route('client-promo') }}"><i class="fa fa-credit-card-blank" aria-hidden="true"></i>Promo</a></li>
      </ul>
    </div>
  </div>
</section>
<!--================End Banner Area =================-->

<!--================Latest News Area =================-->
<section class="latest_news_area p_100">
    <div class="container">
        <div class="b_center_title">
            <h2>Promo</h2>
            <p>Special promotion you can get</p>
        </div>
        <div class="l_news_inner">
            <div id="email-div" class="form-group col-lg-12">
                <input type="text" class="form-control" id="email" name="email" placeholder="email">
                <label id="emailLabel" for="email"></label>
            </div>
            <div>&nbsp</div>
            <div class="row">
            @foreach($listVoucher as $voucher)
                <div class="col-lg-4 col-md-6">
                    <div class="l_news_item">
                        <div class="l_news_img"><a href="#"><img class="img-fluid" src="{{ URL::asset('storage/voucher_img/' . $voucher['code']) }}" alt=""></a></div>
                        <div class="l_news_content">
                            <a  href=""><h4 style="text-align: center">{{ $voucher['name'] }}</h4></a>
                            <button id="{{ $voucher['code'] }}" style="margin: auto" type="submit" value="submit" class="btn submit_btn2 form-control">Get Code</button>
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
<script src="{{ URL::asset('js/voucher.js') }}"></script>
@endsection