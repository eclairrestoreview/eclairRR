@extends('dashboard.layout')

@section('title')
  <h1>Member-Voucher</h1>
@endsection

@section('content')
@foreach($listRestaurant as $restaurant)
  <div>
    <a href="{{URL::route('dashboard-member-voucher-spec', ['restaurant_id' => $restaurant['restaurant_id']])}}">
      {{ $restaurant['name']}}
    </a>
  </div>
@endforeach
@endsection

@section('script')
@endsection