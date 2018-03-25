<!--Card Narrower-->
@foreach($listRestaurant as $restaurant)
<div class="col-md-3">
  <div class="card">

    <!--Card image-->
    <div class="view overlay">
      <img src="https://mdbootstrap.com/img/Photos/Lightbox/Thumbnail/img%20(147).jpg" class="img-fluid" alt="">
      <a>
        <div class="mask rgba-white-slight"></div>
      </a>
    </div>
    <!--/.Card image-->

    <!--Card content-->
    <div class="card-body">
      <h5 class="pink-text"><i class="fa fa-cutlery"></i> {{ $restaurant->rating }}</h5>
      <!--Title-->
      <h4 class="card-title">{{ $restaurant->name }}</h4>
      <!--Text-->
      <p class="card-text">{{  substr(strip_tags($restaurant->desc,'<pre>,<code>'),0,100) }}{{ strlen(strip_tags($restaurant->desc)) > 100 ? "..." : "" }}.</p>
      <a class="btn btn-unique">Read More</a>
    </div>
    <!--/.Card content-->

  </div>
</div>
<!--/.Card Narrower-->
@endforeach

<div id="remove-row">
  <button id="btn-more" data-id="{{ $restaurant->restaurant_id }}"> Load More </button>
</div>