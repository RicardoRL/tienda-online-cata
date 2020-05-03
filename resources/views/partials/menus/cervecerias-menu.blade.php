<li class="nav-item dropdown menu-large"><a href="#" data-toggle="dropdown" data-hover="dropdown" data-delay="200" class="dropdown-toggle nav-link">cervecerías<b class="caret"></b></a>
  <ul class="dropdown-menu megamenu force-scroll">
    <li>
      <div class="row">
        <div class="col-md-6 col-lg-3">
          <h5>A - G</h5>
          <ul class="list-unstyled mb-3">
          @for($i = 0; $i < cervecerias()['grupo1']['cantidad']; $i++)
            <li class="nav-item">
              <a href="{{route('tienda.porCerveceria', ['id'=>cervecerias()['grupo1']['conjunto'][$i]->id])}}"
                class="nav-link prueba">
                {{cervecerias()['grupo1']['conjunto'][$i]->nombre}}
              </a>
            </li>
          @endfor
          </ul>
        </div>
        <div class="col-md-6 col-lg-3">
          <h5>H - N</h5>
          <ul class="list-unstyled mb-3">
          @for($i = 0; $i < cervecerias()['grupo2']['cantidad']; $i++)
            <li class="nav-item">
              <a href="{{route('tienda.porCerveceria', ['id'=>cervecerias()['grupo2']['conjunto'][$i]->id])}}"
                class="nav-link">
                {{cervecerias()['grupo2']['conjunto'][$i]->nombre}}
              </a>
            </li>
          @endfor
          </ul>
        </div>
        <div class="col-md-6 col-lg-3">
          <h5>O - T</h5>
          <ul class="list-unstyled mb-3">
          @for($i = 0; $i < cervecerias()['grupo3']['cantidad']; $i++)
            <li class="nav-item">
              <a href="{{route('tienda.porCerveceria', ['id'=>cervecerias()['grupo3']['conjunto'][$i]->id])}}"
                class="nav-link">
                {{cervecerias()['grupo3']['conjunto'][$i]->nombre}}
              </a>
            </li>
          @endfor
          </ul>
        </div>
        <div class="col-md-6 col-lg-3">
          <h5>U - Z</h5>
          <ul class="list-unstyled mb-3">
          @for($i = 0; $i < cervecerias()['grupo4']['cantidad']; $i++)
            <li class="nav-item">
              <a href="{{route('tienda.porCerveceria', ['id'=>cervecerias()['grupo4']['conjunto'][$i]->id])}}"
                class="nav-link">
                {{cervecerias()['grupo4']['conjunto'][$i]->nombre}}
              </a>
            </li>
          @endfor
          </ul>
        </div>
      </div>
    </li>
  </ul>
</li>