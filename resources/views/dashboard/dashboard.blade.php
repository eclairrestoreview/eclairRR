@extends('dashboard.layout')

@section('title')
  <h1>Dashboard</h1>
@endsection

@section('content')
<div class="container">
  <form id="update-title">
    {{ csrf_field() }}
    <div class="form-group">
      <label for="title">Home Title</label>
      <input type="text" class="form-control" id="title" name="title" aria-describedby="titleHelp" placeholder="Title" value="{{ $title->title }}">
      <small id="titleHelp" class="form-text text-muted">Title for home page.</small>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
  <hr>
  <div>&nbsp</div>
  <form id="update-contact">
    {{ csrf_field() }}
    <div class="form-group">
      <label for="email">Email</label>
      <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" placeholder="Email" value="{{ $contact->email }}">
      <small id="emailHelp" class="form-text text-muted">Email to contact.</small>
    </div>
    <div class="form-group">
      <label for="address">Address</label>
      <input type="text" class="form-control" id="address" name="address" aria-describedby="addressHelp" placeholder="Address" value="{{ $contact->address }}">
      <small id="addressHelp" class="form-text text-muted">Where is the office?</small>
    </div>
    <div class="form-group">
      <label for="phone_number">Phone Number</label>
      <input type="text" class="form-control" id="phone_number" name="phone_number" aria-describedby="phone_numberHelp" placeholder="Phone Number" value="{{ $contact->phone_number }}">
      <small id="phone_numberHelp" class="form-text text-muted">The office phone number.</small>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
  <hr>
  <div>&nbsp</div>
  <form id="update-about">
    {{ csrf_field() }}
    <div class="form-group">
      <label for="about">About</label>
      <textarea class="form-control" id="about" name="about" aria-describedby="aboutHelp" placeholder="About" rows="6">{{ $about->about }}</textarea>
      <small id="aboutHelp" class="form-text text-muted">This is the about profile.</small>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
  <div>&nbsp</div>
  <form id="update-info">
    {{ csrf_field() }}
    <div class="form-group">
      <label for="information">Member Information</label>
      <textarea class="form-control" id="information" name="information" aria-describedby="informationHelp" placeholder="Information" rows="6">{{ $info->information }}</textarea>
      <small id="informationHelp" class="form-text text-muted">This is description for member registration.</small>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
</div>
@endsection

@section('script')
<script src="{{ URL::asset('js/dashboard.js') }}"></script>
@endsection