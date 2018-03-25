<!-- Sidebar Holder -->
<nav id="sidebar">
  <div class="sidebar-header">
    <h3>Eclair Dashboard</h3>
  </div>

  <ul class="list-unstyled components">
    <p>Menu</p>
    <li class="active">
        <a href="{{URL::route('dashboard')}}">Dashboard</a>
    </li>
    <li>
        <a href="#restaurant-sub-menu" data-toggle="collapse" aria-expanded="false">Restaurant</a>
        <ul class="collapse list-unstyled" id="restaurant-sub-menu">
            <li><a href="{{URL::route('dashboard-restaurant')}}">List of Restaurant</a></li>
            <li><a href="{{URL::route('dashboard-top-restaurant')}}">Top Restaurant</a></li>
            <li><a href="{{URL::route('dashboard-review')}}">Review</a></li>
            <li><a href="{{URL::route('dashboard-voucher')}}">Voucher</a></li>
        </ul>
    </li>
    <li>
        <a href="#member-sub-menu" data-toggle="collapse" aria-expanded="false">Member</a>
        <ul class="collapse list-unstyled" id="member-sub-menu">
            <li><a href="{{URL::route('dashboard-member')}}">List of Member</a></li>
            <li><a href="{{URL::route('dashboard-member-voucher')}}">Member Voucher</a></li>
        </ul>
    </li>
  </ul>

  <ul class="list-unstyled CTAs">
    <li><a href="{{URL::route('client-index')}}" class="client-page">Go to Client Page</a></li>
    <li><a href="{{URL::route('logout')}}" class="logout">Logout</a></li>
  </ul>
</nav>