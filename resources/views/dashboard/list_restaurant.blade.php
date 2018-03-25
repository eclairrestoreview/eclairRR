@extends('dashboard.layout')

@section('title')
  <h1>List of Restaurant</h1>
@endsection

@section('content')
<div class="container">
  <div id="toolbar">
    <button id="add-button" class="btn btn-default">Add</button>
    <button id="delete-button" class="btn btn-default">Delete</button>
  </div>

  <table id="table"></table>

  <form id="add-restaurant">
    {{ csrf_field() }}
    <div class="form-group">
      <label for="name">Restaurant Name</label>
      <input type="text" class="form-control" id="name" name="name" aria-describedby="nameHelp" placeholder="Name">
      <small id="nameHelp" class="form-text text-muted">This is the restaurant name.</small>
    </div>
    <div class="form-group">
      <label for="address">Location</label>
      <input type="text" class="form-control" id="address" name="address" aria-describedby="addressHelp" placeholder="Address">
      <small id="addressHelp" class="form-text text-muted">Where is the restaurant?</small>
    </div>
    <div class="form-group">
      <label for="desc">Description</label>
      <textarea class="form-control" id="desc" name="desc" aria-describedby="descHelp" placeholder="Description" rows="6"></textarea>
      <small id="descHelp" class="form-text text-muted">This is description of the restaurant</small>
    </div>
    <div class="form-group">
      <label for="city">City</label>
      <input type="text" class="form-control" id="city" name="city" aria-describedby="cityHelp" placeholder="City">
      <small id="cityHelp" class="form-text text-muted">Where is the restaurant?</small>
    </div>
    <div class="form-group">
      <label for="phone_number">Phone Number</label>
      <input type="text" class="form-control" id="phone_number" name="phone_number" aria-describedby="phone_numberHelp" placeholder="Phone Number">
      <small id="phone_numberHelp" class="form-text text-muted">The restaurant phone number.</small>
    </div>
    <div class="form-group">
      <label for="price_bottom">Lower Bound</label>
      <input type="text" class="form-control" id="price_bottom" name="price_bottom" aria-describedby="price_bottomHelp" placeholder="Lower Bound">
      <small id="price_bottomHelp" class="form-text text-muted">The restaurant lower bound price.</small>
    </div>
    <div class="form-group">
      <label for="price_top">Upper Bound</label>
      <input type="text" class="form-control" id="price_top" name="price_top" aria-describedby="price_topHelp" placeholder="Upper Bound">
      <small id="price_topHelp" class="form-text text-muted">The restaurant upper bound price.</small>
    </div>
    <div class="form-group custom-file">
      <input type="file" class="custom-file-input" id="img_url" name="img_url" aria-describedby="imgHelp">
      <small id="imgHelp" class="form-text text-muted">Choose restaurant image.</small>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
</div>
@endsection

@section('script')
<script type="text/javascript" src="{{URL::asset('/js/tableRestaurant.js')}}"></script>
@endsection