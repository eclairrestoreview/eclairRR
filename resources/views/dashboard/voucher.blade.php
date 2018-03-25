@extends('dashboard.layout')

@section('title')
  <h1>Voucher</h1>
@endsection

@section('content')
<div class="container">
@foreach($listRestaurant as $restaurant)
  <div>
    <a href="{{URL::route('dashboard-voucher-spec', ['restaurant_id' => $restaurant['restaurant_id']])}}">
      {{ $restaurant['name']}}
    </a>
  </div>
@endforeach
</div>
@endsection

@section('script')
@endsection