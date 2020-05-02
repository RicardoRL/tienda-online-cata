<li class="nav-item dropdown menu-large"><a href="#" data-toggle="dropdown" data-hover="dropdown" data-delay="200" class="dropdown-toggle nav-link">Estilos<b class="caret"></b></a>
  <ul class="dropdown-menu megamenu force-scroll">
    <li>
      <div class="row">
        <div class="col-md-6 col-lg-3">
          <ul class="list-unstyled mb-3">
          @for($i = 0; $i < $d1; $i++)
            <li class="nav-item">
              <a href="{{route('cerveza.estilo', $estilos1[$i])}}" class="nav-link">
                {{$estilos1[$i]}}
              </a>
            </li>
          @endfor
          </ul>
        </div>
        <div class="col-md-6 col-lg-3">
          <ul class="list-unstyled mb-3">
          @for($i = 0; $i < $d2; $i++)
            <li class="nav-item">
              <a href="{{route('cerveza.estilo', $estilos2[$i])}}" class="nav-link">
                {{$estilos2[$i]}}
              </a>
            </li>
          @endfor
          </ul>
        </div>
        <div class="col-md-6 col-lg-3">
          <ul class="list-unstyled mb-3">
          @for($i = 0; $i < $d3; $i++)
            <li class="nav-item">
              <a href="{{route('cerveza.estilo', $estilos3[$i])}}" class="nav-link">
                {{$estilos3[$i]}}
              </a>
            </li>
          @endfor
          </ul>
        </div>
        <div class="col-md-6 col-lg-3">
          <ul class="list-unstyled mb-3">
          @for($i = 0; $i < $d4; $i++)
            <li class="nav-item">
              <a href="{{route('cerveza.estilo', $estilos4[$i])}}" class="nav-link">
                {{$estilos4[$i]}}
              </a>
            </li>
          @endfor
          </ul>
        </div>
      </div>
    </li>
  </ul>
</li>