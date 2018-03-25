@extends('client.layout')

@section('content')
<!--================Banner Area =================-->
<section class="banner_area">
  <div class="container">
    <div class="banner_text_inner">
      <h4>About Eclair</h4>
      <ul>
        <li><a href="{{ URL::route('client-about') }}"><i class="fa fa-address-book" aria-hidden="true"></i>About</a></li>
      </ul>
    </div>
  </div>
</section>
<!--================End Banner Area =================-->

<!--================Contact Us Area =================-->
<section class="contact_us_area">
  <div class="container">
    <div class="row">
        <div class="col-lg-6">
            <div class="contact_text">
                <div class="main_title">
                    <h2>Contact Us</h2>
                    <p>There are many ways to contact us. You may drop us a line, give us a call or send an email, choose what suits you the most</p>
                </div>
                <div class="contact_d_list">
                    <div class="contact_d_list_item">
                        <a href="#">{{ $contact->phone_number }}</a>
                        <a href="#">{{ $contact->email }}</a>
                    </div>
                    <div class="contact_d_list_item">
                        <p>{{ $contact->address }}</p>
                    </div>
                </div>
                <div class="static_social">
                    <div class="main_title">
                        <h2>Follow Us:</h2>
                    </div>
                    <ul>
                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                        <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="contact_form">
                <div class="main_title">
                    <h2>About</h2>
                    <p style="word-wrap: break-word;">{{ $about->about}}</p>
                </div>
            </div>
        </div>
    </div>
  </div>
</section>
<!--================End Contact Us Area =================-->
@endsection

@section('script')
@endsection