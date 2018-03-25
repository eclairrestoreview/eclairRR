<!doctype html>
<html>
<head>
  @include('dashboard.head')
</head>
<body>
  <div class="wrapper">
      @include('dashboard.navigator')
      <div id="content">
          @include('dashboard.toogle')
          @yield('title')
          @yield('content')
          @yield('script')
      </div>
  </div>
  @include('dashboard.footer')
</body>
</html>

