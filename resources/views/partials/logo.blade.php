@guest
  <a href="{{route('inicio')}}" class="navbar-brand home">
    <img src="/img/cata-logo.png" alt="CATA logo" class="d-none d-md-inline-block">
    <img src="/img/cata-logo-sm.png" alt="CATA logo" class="d-inline-block d-md-none">
    <span class="sr-only">CATA - go to homepage</span>
  </a>
@else
  <a href="{{route('cliente.index')}}" class="navbar-brand home">
    <img src="/img/cata-logo.png" alt="Obaju logo" class="d-none d-md-inline-block">
    <img src="/img/cata-logo-sm.png" alt="Obaju logo" class="d-inline-block d-md-none">
    <span class="sr-only">CATA - go to homepage</span>
  </a>
@endguest
<div class="navbar-buttons">
  <button type="button" data-toggle="collapse" data-target="#navigation" class="btn btn-outline-secondary navbar-toggler">
    <span class="sr-only">Toggle navigation</span>
    <i class="fa fa-align-justify"></i>
  </button>
  <button type="button" data-toggle="collapse" data-target="#search" class="btn btn-outline-secondary navbar-toggler">
    <span class="sr-only">Toggle search</span>
    <i class="fa fa-search"></i>
  </button>
  @auth
    <a href="{{route('cart.index')}}" class="btn btn-outline-secondary navbar-toggler">
      <i class="fa fa-shopping-cart"></i>
    </a>
  @endauth
</div>