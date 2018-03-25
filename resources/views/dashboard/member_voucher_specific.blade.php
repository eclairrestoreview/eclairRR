@extends('dashboard.layout')

@section('title')
  <h1>Voucher Member of {{ $restaurant['name'] }}</h1>
@endsection

@section('content')
<div class="container">
  <input type="hidden" id="restaurant_id" name="restaurant_id" value="{{ $restaurant['restaurant_id'] }}">
  <div id="toolbar">
    <button id="delete-button" class="btn btn-default">Delete</button>
  </div>

  <table id="table"></table>
</div>
@endsection

@section('script')
<script type="text/javascript" src="{{URL::asset('/js/tableMemberVoucher.js')}}"></script>
@endsection