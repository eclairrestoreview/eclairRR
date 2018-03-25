@extends('client.layout')

@section('content')
<!--================Banner Area =================-->
<section class="banner_area">
  <div class="container">
    <div class="banner_text_inner">
      <h4>Wanna be a Member of Eclair?</h4>
      <ul>
        <li><a href="{{ URL::route('client-member') }}"><i class="fa fa-child" aria-hidden="true"></i>Member</a></li>
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
                    <h2>Member</h2>
                    <div class="row">
                        <div class="col-md-11">
                            <p style="word-wrap: break-word;">{{ $info->information }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="contact_form">
                <div class="main_title">
                    <h2>Registration</h2>
                    <p>Fill out the form below to recieve a free and confidential.</p>
                </div>
                <form class="contact_us_form row" id="memberForm" novalidate="novalidate">
                    <div class="form-group col-lg-12">
                        <input type="text" class="form-control" id="name" name="name" placeholder="Name">
                    </div>
                    <div class="form-group col-lg-12">
                        <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                    </div>
                    <div class="form-group col-lg-12">
                        <input type="email" class="form-control" id="email" name="email" placeholder="Email">
                    </div>
                    <div class="form-group col-lg-12">
                        <input type="text" class="form-control" id="phone_number" name="phone_number" placeholder="Phone Number">
                    </div>
                    <div class="form-group col-md-12">
                        <button type="submit" value="submit" class="btn submit_btn2 form-control">Register</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
  </div>
</section>
<!--================End Contact Us Area =================-->
@endsection

@section('script')
<script src="{{ URL::asset('js/insertMember.js') }}"></script>
@endsection