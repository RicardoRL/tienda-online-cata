<div id="hot">
  <div class="box py-4">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h2 class="mb-0">lo mejor</h2>
        </div>
      </div>
    </div>
  </div>
  <div class="container">
    <div class="product-slider owl-carousel owl-theme">
      @foreach($cervezas as $cerveza)
      <div class="item">
        <div class="product">
          <div class="flip-container">
            <div class="flipper">
              <div class="front"><a href="{{route('tienda.show', $cerveza->id)}}"><img src="{{$cerveza->imagen}}" alt="" class="img-fluid"></a></div>
              <div class="back"><a href="{{route('tienda.show', $cerveza->id)}}"><img src="{{$cerveza->imagen}}" alt="" class="img-fluid"></a></div>
            </div>
          </div>
          <a href="{{route('tienda.show', $cerveza->id)}}" class="invisible"><img src="{{$cerveza->imagen}}" alt="" class="img-fluid"></a>
          <div class="text">
            <h3><a href="{{route('tienda.show', $cerveza->id)}}">{{$cerveza->nombre}}</a></h3>
            <p class="price"> 
              <del></del>${{$cerveza->precio}}
            </p>
          </div>
        </div>
      </div>
      @endforeach
    </div>
    <div class="row justify-content-center">
      <p class="loadMore">
        <a href="{{route('tienda.index', ['block' => 1, 'page' => 1])}}" class="btn btn-primary btn-lg">
          Mostrar todo
        </a>
      </p>
    </div>
  </div>
</div>