<div class="row same-height-row">
  <div class="col-lg-3 col-md-6">
    <div class="box same-height">
      <h3>Estos productos podrían gustarte</h3>
    </div>
  </div>
  @foreach($sugerencias as $sugerencia)
    <div class="col-md-3 col-sm-6">
      <div class="product same-height">
        <div class="flip-container">
          <div class="flipper">
            <div class="front"><a href="{{route('tienda.show', $sugerencia->id)}}"><img src="{{$sugerencia->imagen}}" alt="{{$sugerencia->nombre}}" class="img-fluid"></a></div>
            <div class="back"><a href="{{route('tienda.show', $sugerencia->id)}}"><img src="{{$sugerencia->imagen}}" alt="{{$sugerencia->nombre}}" class="img-fluid"></a></div>
          </div>
        </div>
        <a href="{{route('tienda.show', $sugerencia->id)}}" class="invisible">
          <img src="{{$sugerencia->imagen}}" alt="" class="img-fluid">
        </a>
        <div class="text">
          <h3>{{$sugerencia->nombre}}</h3>
          <p class="price">${{$sugerencia->precio}}</p>
        </div>
      </div>
    </div>
  @endforeach
</div>