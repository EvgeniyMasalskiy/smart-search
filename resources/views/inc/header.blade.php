@section('header')
<header class="border-bottom">
  <div class="row">
    <div class="col-3">
      <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-dark text-decoration-none">
        <span class="fs-4">
          <h4>БНТУ Умный поиск</h4>
        </span>
      </a>
    </div>
    <div class="col-8">
      @yield('header-content')
    </div>
    <div class="col-1">
      @if(Auth::check())
      @include('inc.authOffcanvas')
      @else
      @include('inc.guestOffcanvas')
      @endif
    </div>
  </div>
</header>