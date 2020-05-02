@guest
  <a href="{{route('inicio')}}" class="navbar-brand home">
    <img src="/img/logo.png" alt="Obaju logo" class="d-none d-md-inline-block">
    <img src="img/logo-small.png" alt="Obaju logo" class="d-inline-block d-md-none">
    <span class="sr-only">Obaju - go to homepage</span>
  </a>
@else
  <a href="{{route('cliente.index')}}" class="navbar-brand home">
    <img src="/img/logo.png" alt="Obaju logo" class="d-none d-md-inline-block">
    <img src="img/logo-small.png" alt="Obaju logo" class="d-inline-block d-md-none">
    <span class="sr-only">Obaju - go to homepage</span>
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
  <a href="basket.html" class="btn btn-outline-secondary navbar-toggler">
    <i class="fa fa-shopping-cart"></i>
  </a>
</div>