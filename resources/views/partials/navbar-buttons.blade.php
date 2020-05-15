<div class="navbar-buttons d-flex justify-content-end">
  <div id="search-not-mobile" class="navbar-collapse collapse"></div>
  <a data-toggle="collapse" href="#search" class="btn navbar-btn btn-primary d-none d-lg-inline-block">
    <span class="sr-only">Toggle search</span>
    <i class="fa fa-search"></i>
  </a>
  @auth
    <div id="basket-overview" class="navbar-collapse collapse d-none d-lg-block">
      <a href="{{route('cart.index')}}" class="btn btn-primary navbar-btn">
        <i class="fa fa-shopping-cart"></i>
        <span>{{Cart::getTotalQuantity()}}</span>
      </a>
    </div>
  @endauth
</div>