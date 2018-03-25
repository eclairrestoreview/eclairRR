@extends('dashboard.layout')

@section('title')
  <h1>Voucher of {{ $restaurant['name'] }}</h1>
@endsection

@section('content')
<div class="container">
  <div id="toolbar">
    <button id="add-button" class="btn btn-default">Add</button>
    <button id="delete-button" class="btn btn-default">Delete</button>
  </div>

  <table id="table"></table>

  <form id="add-voucher">
    {{ csrf_field() }}
    <div class="form-group">
      <input type="hidden" id="restaurant_id" name="restaurant_id" value="{{ $restaurant['restaurant_id'] }}">
    </div>
    <div class="form-group">
      <label for="code">Voucher Code</label>
      <input type="text" class="form-control" id="code" name="code" aria-describedby="codeHelp" placeholder="Code">
      <small id="codeHelp" class="form-text text-muted">This is the voucher code.</small>
    </div>
    <div class="form-group">
      <label for="name">Voucher Name</label>
      <input type="text" class="form-control" id="name" name="name" aria-describedby="nameHelp" placeholder="Name">
      <small id="nameHelp" class="form-text text-muted">This is the voucher name.</small>
    </div>
    <div class="form-group">
      <label for="description">Description</label>
      <textarea class="form-control" id="description" name="description" aria-describedby="descriptionHelp" placeholder="Description" rows="3"></textarea>
      <small id="descriptionHelp" class="form-text text-muted">This is the voucher name.</small>
    </div>
    <div class="form-group">
      <label for="valid_from">Valid From</label>
      <div class='input-group date' id='valid_from_picker'>
        <input type='text' class="form-control" id='valid_from' name="valid_from" aria-describedby="valid_fromHelp" placeholder="Valid From" />
        <span class="input-group-addon">
          <span class="glyphicon glyphicon-calendar"></span>
        </span>
      </div>
      <small id="valid_fromHelp" class="form-text text-muted">The voucher valid date.</small>
    </div>
    <div class="form-group">
      <label for="valid_until">Valid Until</label>
      <div class='input-group date' id='valid_until_picker'>
        <input type='text' class="form-control" id='valid_until' name="valid_until" aria-describedby="valid_untilHelp" placeholder="Valid Until" />
        <span class="input-group-addon">
          <span class="glyphicon glyphicon-calendar"></span>
        </span>
      </div>
      <small id="valid_untilHelp" class="form-text text-muted">The voucher valid date.</small>
    </div>
    <div class="form-group custom-file">
      <input type="file" class="custom-file-input" id="img_url" name="img_url" aria-describedby="imgHelp">
      <small id="imgHelp" class="form-text text-muted">Choose voucher image.</small>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
</div>
@endsection

@section('script')
<script type="text/javascript" src="{{URL::asset('/js/tableVoucherSpec.js')}}"></script>
@endsection