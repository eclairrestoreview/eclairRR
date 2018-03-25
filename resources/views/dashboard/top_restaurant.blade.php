@extends('dashboard.layout')

@section('title')
  <h1>Top Restaurant</h1>
@endsection

@section('content')
<div class="container">
  <div id="toolbar">
    <button id="delete-button" class="btn btn-default">Delete</button>
  </div>

  <table id="table"></table>

  <form id="add-top" class="form-horizontal">
    {{ csrf_field() }}
    <div class="form-group">
      <label for="focusedinput" class="col-sm-2 control-label">
        <select name="restaurant_id" id="restaurant_id" class="form-control input-sm">
          <option value="" selected="selected" disabled>Restaurant List</option>
          @foreach($listRestaurant as $restaurant)
            <option value={{ $restaurant['restaurant_id'] }}> {{ $restaurant['name'] }} </option>
          @endforeach
        </select>
      </label>
    </div>
    <button class="btn btn-primary">Add Top Restaurant</button>
  </form>
</div>
@endsection

@section('script')
<script src="{{ URL::asset('js/tableTopRestaurant.js') }}"></script>
@endsection