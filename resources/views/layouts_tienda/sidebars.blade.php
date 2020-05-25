<div class="col-lg-3">
  <div class="card sidebar-menu mb-4">
    <div class="card-header">
      <h3 class="h4 card-title">Estilos</h3>
    </div>
    <div class="card-body force-scroll-estilos">
      <ul class="list-unstyled">
        <!-- foreach para los estilos-->
        @foreach($estilos as $estilo)
          <li><a href="{{route('tienda.porEstilo', $estilo->estilo)}}" class="nav-link">{{$estilo->estilo}}</a></li>
        @endforeach
      </ul>
    </div>
  </div>
  <div class="card sidebar-menu mb-4">
    <div class="card-header">
      <h3 class="h4 card-title">Cervecerías</h3>
    </div>
    <div class="card-body force-scroll-estilos">
      <ul class="list-unstyled">
        <!-- foreach para las cervecerías-->
        @foreach($cervecerias as $cerveceria)
          <li><a href="{{route('tienda.porCerveceria', ['id'=>$cerveceria->id])}}" class="nav-link">{{$cerveceria->nombre}}</a></li>
        @endforeach
      </ul>
    </div>
  </div>
</div>