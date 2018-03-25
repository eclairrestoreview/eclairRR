@extends('dashboard.layout')

@section('title')
  <h1>List of Member</h1>
@endsection

@section('content')
<div class="container">
  <div id="toolbar">
    <button id="delete-button" class="btn btn-default">Delete</button>
  </div>
  <table id="table"></table>
</div>
@endsection

@section('script')
<script type="text/javascript" src="{{URL::asset('/js/tableMember.js')}}"></script>
@endsection