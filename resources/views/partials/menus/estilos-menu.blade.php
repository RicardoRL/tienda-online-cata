<li class="nav-item dropdown menu-large"><a href="#" data-toggle="dropdown" data-hover="dropdown" data-delay="200" class="dropdown-toggle nav-link">Estilos<b class="caret"></b></a>
  <ul class="dropdown-menu megamenu force-scroll">
    <li>
      <div class="row">
        <div class="col-md-6 col-lg-3">
          <ul class="list-unstyled mb-3">
          @for($i = 0; $i < $estilos['estilos1']['cantidad']; $i++)
            <li class="nav-item">
              <a href="{{route('cerveza.estilo', $estilos['estilos1']['conjunto'][$i])}}" class="nav-link">
                {{$estilos['estilos1']['conjunto'][$i]}}
              </a>
            </li>
          @endfor
          </ul>
        </div>
        <div class="col-md-6 col-lg-3">
          <ul class="list-unstyled mb-3">
          @for($i = 0; $i < $estilos['estilos2']['cantidad']; $i++)
            <li class="nav-item">
              <a href="{{route('cerveza.estilo', $estilos['estilos2']['conjunto'][$i])}}" class="nav-link">
                {{$estilos['estilos2']['conjunto'][$i]}}
              </a>
            </li>
          @endfor
          </ul>
        </div>
        <div class="col-md-6 col-lg-3">
          <ul class="list-unstyled mb-3">
          @for($i = 0; $i < $estilos['estilos3']['cantidad']; $i++)
            <li class="nav-item">
              <a href="{{route('cerveza.estilo', $estilos['estilos3']['conjunto'][$i])}}" class="nav-link">
                {{$estilos['estilos3']['conjunto'][$i]}}
              </a>
            </li>
          @endfor
          </ul>
        </div>
        <div class="col-md-6 col-lg-3">
          <ul class="list-unstyled mb-3">
          @for($i = 0; $i < $estilos['estilos4']['cantidad']; $i++)
            <li class="nav-item">
              <a href="{{route('cerveza.estilo', $estilos['estilos4']['conjunto'][$i])}}" class="nav-link">
                {{$estilos['estilos4']['conjunto'][$i]}}
              </a>
            </li>
          @endfor
          </ul>
        </div>
      </div>
    </li>
  </ul>
</li>