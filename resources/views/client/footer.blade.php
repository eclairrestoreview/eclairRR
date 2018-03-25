<!--================Footer Area =================-->
<footer class="footer_area">
    <div class="footer_widgets_area">
        <div class="container">
            <div class="f_widgets_inner row">
                <div class="col-lg-3">
                </div>
                <div class="col-lg-3 col-md-6">
                    <aside class="f_widget categories_widget">
                        <div class="f_w_title">
                            <h3>Link Categories</h3>
                        </div>
                        <ul>
                            <li><a href="{{ URL::route('client-index') }}"><i class="fa fa-angle-double-right" aria-hidden="true"></i>Home</a></li>
                            <li><a href="{{ URL::route('client-member') }}"><i class="fa fa-angle-double-right" aria-hidden="true"></i>Member</a></li>
                            <li><a href="{{ URL::route('client-promo') }}"><i class="fa fa-angle-double-right" aria-hidden="true"></i>Promo</a></li>
                            <li><a href="{{ URL::route('client-partnership') }}"><i class="fa fa-angle-double-right" aria-hidden="true"></i>Partnership</a></li>
                            <li><a href="{{ URL::route('client-about') }}"><i class="fa fa-angle-double-right" aria-hidden="true"></i>About</a></li>
                        </ul>
                    </aside>
                </div>
                <div class="col-lg-3 col-md-6">
                    <aside class="f_widget contact_widget">
                        <div class="f_w_title">
                            <h3>Contact Us</h3>
                        </div>
                        <a href="#">{{ $contact->phone_number }}</a>
                        <a href="#">{{ $contact->email }}</a>
                        <p>{{ $contact->address }}</p>
                    </aside>
                </div>
            </div>
        </div>
    </div>
    <div class="copy_right_area">
        <div class="container">
            <div class="float-md-left">
                <h5>Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a></h5>
            </div>
        </div>
    </div>
</footer>
<!--================End Footer Area =================-->

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="{{URL::asset('js/jquery-3.2.1.min.js')}}"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="{{URL::asset('js/popper.min.js')}}"></script>
<script src="{{URL::asset('js/bootstrap.min.js')}}"></script>
<!-- Rev slider js -->
<script src="{{URL::asset('vendors/revolution/js/jquery.themepunch.tools.min.js')}}"></script>
<script src="{{URL::asset('vendors/revolution/js/jquery.themepunch.revolution.min.js')}}"></script>
<script src="{{URL::asset('vendors/revolution/js/extensions/revolution.extension.actions.min.js')}}"></script>
<script src="{{URL::asset('vendors/revolution/js/extensions/revolution.extension.video.min.js')}}"></script>
<script src="{{URL::asset('vendors/revolution/js/extensions/revolution.extension.slideanims.min.js')}}"></script>
<script src="{{URL::asset('vendors/revolution/js/extensions/revolution.extension.layeranimation.min.js')}}"></script>
<script src="{{URL::asset('vendors/revolution/js/extensions/revolution.extension.navigation.min.js')}}"></script>
<script src="{{URL::asset('vendors/revolution/js/extensions/revolution.extension.slideanims.min.js')}}"></script>
<!-- Extra plugin css -->
<script src="{{URL::asset('vendors/counterup/jquery.waypoints.min.js')}}"></script>
<script src="{{URL::asset('vendors/counterup/jquery.counterup.min.js')}}"></script>
<script src="{{URL::asset('vendors/counterup/apear.js')}}"></script>
<script src="{{URL::asset('vendors/counterup/countto.js')}}"></script>
<script src="{{URL::asset('vendors/owl-carousel/owl.carousel.min.js')}}"></script>
<script src="{{URL::asset('vendors/parallaxer/jquery.parallax-1.1.3.js')}}"></script>

<script src="{{URL::asset('js/theme.js')}}"></script>

<script src="{{URL::asset('js/search.js')}}"></script>

<script src="{{URL::asset('js/changeTab.js')}}"></script>