<!doctype html>
<html>
<head>
  @include('dashboard.head')
  <link rel="stylesheet" href="{{URL::asset('css/login.css')}}">
</head>
<body>
<div class="login-page">
  <div class="form">
    <h1 style="text-align:center"><b>Admin Login</b></h1>
    {!! Form::open(['url' => '/loginProcess', 'method' => 'post', 'class' => 'form-horizontal']) !!}
    {!! Form::token() !!}
    {!! Form::text('username', '', ['class' => 'form-control pull-right', 'placeholder'=>'Username']) !!}
    {!! Form::password('password', ['class' => 'form-control pull-right', 'placeholder'=>'Password']) !!}
    {!! Form::submit('Login', ['class' => 'btn btn-info pull-right']) !!}
    <div>&nbsp</div>
    {{ Form::close() }}
  </div>
</div>
<script>
  $('.message a').click(function(){
   $('form').animate({height: "toggle", opacity: "toggle"}, "slow");
  });
</script>
</body>
</html>