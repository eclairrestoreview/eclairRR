@extends('client.layout')

@section('content')
  @include('client.carousel')
  @include('client.top_restaurant')
  @include('client.review_home')
@endsection

@section('script')
<script src="{{ URL::asset('js/homeLoader.js') }}"></script>
@endsection