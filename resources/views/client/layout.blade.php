<!doctype html>
<html>
<head>
  @include('client.head')
</head>
<body>
  @include('client.navigator')
  <div id="content">
      @yield('content')
      @yield('script')
  </div>
  @include('client.footer')
</body>
</html>

