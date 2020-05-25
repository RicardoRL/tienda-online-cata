<div class="container">
  <div class="row">
    <div class="col-lg-6 offer mb-3 mb-lg-0"></div>
    <div class="col-lg-6 text-center text-lg-right">
    @guest
      <ul class="menu list-inline mb-0">
        <li class="list-inline-item"><a href="{{route('login')}}" data-toggle="modal" data-target="#login-modal">Ingresar</a></li>
        <li class="list-inline-item"><a href="{{route('register')}}">Registrar</a></li>
        <li class="list-inline-item"><a href="contact.html">Contacto</a></li>
      </ul>
    @else
      <ul class="menu list-inline mb-0">
        <li class="list-inline-item"><a>Bienvenido(a) {{Auth::user()->nombre}}</a></li>
        <li class="list-inline-item"><a href="{{route('cliente.show', [Auth::user()->id])}}">Mi Cuenta</a></li>
        <li class="list-inline-item"><a href="{{route('logout')}}"
                                      onclick="event.preventDefault();
                                      document.getElementById('logout-form').submit();">Salir</a></li>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
          @csrf
        </form>
      </ul>
    @endguest
    </div>
  </div>
</div>