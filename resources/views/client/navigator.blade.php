<!--================Search Area =================-->
<section class="search_area">
<div class="search_inner">
    <input type="text" id="search" name="search" placeholder="Search for Restaurant">
    <i class="ti-close"></i>
</div>
</section>
<!--================End Search Area =================-->

<!--================Header Menu Area =================-->
<header class="main_menu_area">
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a style="color:white" class="navbar-brand" href="{{URL::route('client-index')}}">Eclair</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span></span>
        <span></span>
        <span></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li id="in-home" class="nav-item"><a class="nav-link" href="{{URL::route('client-index')}}">Home</a></li>
            <li id="in-member" class="nav-item"><a class="nav-link" href="{{URL::route('client-member')}}">Member</a></li>
            <li id="in-promo" class="nav-item"><a  href="{{URL::route('client-promo')}}">Promo</a></li>
            <li id="in-partnership" class="nav-item"><a class="nav-link" href="{{URL::route('client-partnership')}}">Partnership</a></li>
            <li id="in-about" class="nav-item"><a class="nav-link" href="{{URL::route('client-about')}}">About</a></li>
        </ul>
        <ul class="navbar-nav justify-content-end">
            <li><a href="#"><i class="icon_search"></i></a></li>
            <li><a href=""><i class="icon_bag_alt"></i></a></li>
        </ul>
    </div>
</nav>
</header>
<!--================End Header Menu Area =================-->