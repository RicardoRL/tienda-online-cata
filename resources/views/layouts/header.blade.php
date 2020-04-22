<?php
$cervecerias = mostrarCerveceriasMenu();
$estilos = mostrarEstilosMenu();
if(isset($cervecerias) && isset($estilos))
{
  $grupo1 = $cervecerias[0];
  $grupo2 = $cervecerias[1];
  $grupo3 = $cervecerias[2];
  $grupo4 = $cervecerias[3];

  $estilos1 = $estilos[0];
  $estilos2 = $estilos[1];
  $estilos3 = $estilos[2];
  $estilos4 = $estilos[3];
  
  $c1 = count($grupo1);
  $c2 = count($grupo2);
  $c3 = count($grupo3);
  $c4 = count($grupo4);

  $d1 = count($estilos1);
  $d2 = count($estilos2);
  $d3 = count($estilos3);
  $d4 = count($estilos4);
}
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>CATA online</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href="/vendor/bootstrap/css/bootstrap.min.css">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!-- Font Awesome CSS-->
    <link rel="stylesheet" href="/vendor/font-awesome/css/font-awesome.min.css">
    <!-- Google fonts - Roboto -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,700">
    <!-- owl carousel-->
    <link rel="stylesheet" href="/vendor/owl.carousel/assets/owl.carousel.css">
    <link rel="stylesheet" href="/vendor/owl.carousel/assets/owl.theme.default.css">
    <!-- theme stylesheet-->
    <link rel="stylesheet" href="/css/style.default.css" id="theme-stylesheet">
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="/css/custom.css">
    <!-- Favicon-->
    <link rel="shortcut icon" href="/favicon.png">
    <!-- Tweaks for older IEs--><!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
    
    <!-- JavaScript files-->
    <script src="/vendor/jquery/jquery.min.js"></script>
    <script src="/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="/vendor/jquery.cookie/jquery.cookie.js"> </script>
    <script src="/vendor/owl.carousel/owl.carousel.min.js"></script>
    <script src="/vendor/owl.carousel2.thumbs/owl.carousel2.thumbs.js"></script>
    <script src="/js/front.js"></script>
  </head>
  <body>
    <!-- navbar-->
    <header class="header mb-5">
      <!--
      *** TOPBAR ***
      _________________________________________________________
      -->
      <div id="top">
        <div class="container">
          <div class="row">
            <div class="col-lg-6 offer mb-3 mb-lg-0"><a href="#" class="btn btn-success btn-sm">Offer of the day</a><a href="#" class="ml-1">Get flat 35% off on orders over $50!</a></div>
            <div class="col-lg-6 text-center text-lg-right">
            @guest
              <ul class="menu list-inline mb-0">
                <li class="list-inline-item"><a href="{{route('login')}}" data-toggle="modal" data-target="#login-modal">Ingresar</a></li>
                <li class="list-inline-item"><a href="{{route('register')}}">Registrar</a></li>
                <li class="list-inline-item"><a href="contact.html">Contacto</a></li>
              </ul>
            @else
              <ul class="menu list-inline mb-0">
                <li class="list-inline-item"><a>Bienvenido {{Auth::user()->nombre}}</a></li>
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
        <div id="login-modal" tabindex="-1" role="dialog" aria-labelledby="Login" aria-hidden="true" class="modal fade">
          <div class="modal-dialog modal-sm">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Ingresar</h5>
                <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
              </div>
              <div class="modal-body">
                <form action="{{route('login')}}" method="POST">
                  @csrf
                  <div class="form-group">
                    <input id="email-modal" type="text" placeholder="Correo electrónico" class="form-control" name="correo" required>
                    @error('email-modal')
                      <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                  </div>
                  <div class="form-group">
                    <input id="password-modal" type="password" placeholder="Contraseña" class="form-control" name="password" required>
                    @error('password-modal')
                      <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                  </div>
                  <p class="text-center">
                    <button class="btn btn-primary"><i class="fa fa-sign-in"></i>Ingresar</button>
                  </p>
                </form>
                <p class="text-center text-muted">¿Aún no has creado tu cuenta?</p>
                <p class="text-center text-muted">
                  <a href="{{route('register')}}">
                    <strong>¡Regístrate ahora!</strong>
                  </a> Es rápido y fácil y podrás tener acceso a descuentos especiales y mucho más.
                </p>
              </div>
            </div>
          </div>
        </div>
        <!-- *** TOP BAR END ***-->
        
        
      </div>
      <nav class="navbar navbar-expand-lg">
        <div class="container">
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
            <button type="button" data-toggle="collapse" data-target="#navigation" class="btn btn-outline-secondary navbar-toggler"><span class="sr-only">Toggle navigation</span><i class="fa fa-align-justify"></i></button>
            <button type="button" data-toggle="collapse" data-target="#search" class="btn btn-outline-secondary navbar-toggler"><span class="sr-only">Toggle search</span><i class="fa fa-search"></i></button><a href="basket.html" class="btn btn-outline-secondary navbar-toggler"><i class="fa fa-shopping-cart"></i></a>
          </div>
          <div id="navigation" class="collapse navbar-collapse">
            <ul class="navbar-nav mr-auto">
              @guest
                <li class="nav-item"><a href="{{route('inicio')}}" class="nav-link">Inicio</a></li>
              @else
                <li class="nav-item"><a href="{{route('cliente.index')}}" class="nav-link">Inicio</a></li>
              @endguest
              <li class="nav-item dropdown menu-large"><a href="#" data-toggle="dropdown" data-hover="dropdown" data-delay="200" class="dropdown-toggle nav-link">cervezas mexicanas<b class="caret"></b></a>
                <ul class="dropdown-menu megamenu force-scroll">
                  <li>
                    <div class="row">
                      <div class="col-md-6 col-lg-3">
                        <h5>A - G</h5>
                        <ul class="list-unstyled mb-3">
                        @for($i = 0; $i < $c1; $i++)
                          <li class="nav-item"><a href="category.html" class="nav-link">{{$grupo1[$i]}}</a></li>
                        @endfor
                        </ul>
                      </div>
                      <div class="col-md-6 col-lg-3">
                        <h5>H - N</h5>
                        <ul class="list-unstyled mb-3">
                        @for($i = 0; $i < $c2; $i++)
                          <li class="nav-item"><a href="category.html" class="nav-link">{{$grupo2[$i]}}</a></li>
                        @endfor
                        </ul>
                      </div>
                      <div class="col-md-6 col-lg-3">
                        <h5>O - T</h5>
                        <ul class="list-unstyled mb-3">
                        @for($i = 0; $i < $c3; $i++)
                          <li class="nav-item"><a href="category.html" class="nav-link">{{$grupo3[$i]}}</a></li>
                        @endfor
                        </ul>
                      </div>
                      <div class="col-md-6 col-lg-3">
                        <h5>U - Z</h5>
                        <ul class="list-unstyled mb-3">
                        @for($i = 0; $i < $c4; $i++)
                          <li class="nav-item"><a href="category.html" class="nav-link">{{$grupo4[$i]}}</a></li>
                        @endfor
                        </ul>
                      </div>
                    </div>
                  </li>
                </ul>
              </li>
              <li class="nav-item dropdown menu-large"><a href="#" data-toggle="dropdown" data-hover="dropdown" data-delay="200" class="dropdown-toggle nav-link">cervezas importadas<b class="caret"></b></a>
                <ul class="dropdown-menu megamenu">
                  <li>
                    <div class="row">
                      <div class="col-md-6 col-lg-3">
                        <div class="banner"><a href="#"><img src="img/banner.jpg" alt="" class="img img-fluid"></a></div>
                      </div>
                      <div class="col-md-6 col-lg-3">
                        <h5>cervecerias</h5>
                        <ul class="list-unstyled mb-3">
                          <li class="nav-item"><a href="category.html" class="nav-link">carlsberg</a></li>
                          <li class="nav-item"><a href="category.html" class="nav-link">pilsner urquell</a></li>
                          <li class="nav-item"><a href="category.html" class="nav-link">schneider weisse</a></li>
                          <li class="nav-item"><a href="category.html" class="nav-link">stiegl</a></li>
                          <li class="nav-item"><a href="category.html" class="nav-link">urpiner</a></li>
                        </ul>
                      </div>
                      <div class="col-md-6 col-lg-3"></div>
                      <div class="col-md-6 col-lg-3">
                        <div class="banner"><a href="#"><img src="img/banner.jpg" alt="" class="img img-fluid"></a></div>
                        <div class="banner"><a href="#"><img src="img/banner2.jpg" alt="" class="img img-fluid"></a></div>
                      </div>
                    </div>
                  </li>
                </ul>
              </li>
              <li class="nav-item dropdown menu-large"><a href="#" data-toggle="dropdown" data-hover="dropdown" data-delay="200" class="dropdown-toggle nav-link">Estilos<b class="caret"></b></a>
                <ul class="dropdown-menu megamenu force-scroll">
                  <li>
                    <div class="row">
                      <div class="col-md-6 col-lg-3">
                        <ul class="list-unstyled mb-3">
                        @for($i = 0; $i < $d1; $i++)
                          <li class="nav-item"><a href="detail.html" class="nav-link">{{$estilos1[$i]}}</a></li>
                        @endfor
                        </ul>
                      </div>
                      <div class="col-md-6 col-lg-3">
                        <ul class="list-unstyled mb-3">
                        @for($i = 0; $i < $d2; $i++)
                          <li class="nav-item"><a href="detail.html" class="nav-link">{{$estilos2[$i]}}</a></li>
                        @endfor
                        </ul>
                      </div>
                      <div class="col-md-6 col-lg-3">
                        <ul class="list-unstyled mb-3">
                        @for($i = 0; $i < $d3; $i++)
                          <li class="nav-item"><a href="detail.html" class="nav-link">{{$estilos3[$i]}}</a></li>
                        @endfor
                        </ul>
                      </div>
                      <div class="col-md-6 col-lg-3">
                        <ul class="list-unstyled mb-3">
                        @for($i = 0; $i < $d4; $i++)
                          <li class="nav-item"><a href="detail.html" class="nav-link">{{$estilos4[$i]}}</a></li>
                        @endfor
                        </ul>
                      </div>
                    </div>
                  </li>
                </ul>
              </li>
            </ul>
            <div class="navbar-buttons d-flex justify-content-end">
              <!-- /.nav-collapse-->
              <div id="search-not-mobile" class="navbar-collapse collapse"></div>
              <a data-toggle="collapse" href="#search" class="btn navbar-btn btn-primary d-none d-lg-inline-block">
                <span class="sr-only">Toggle search</span>
                <i class="fa fa-search"></i>
              </a>
              @auth
                <div id="basket-overview" class="navbar-collapse collapse d-none d-lg-block">
                  <a href="{{route('cart.index')}}" class="btn btn-primary navbar-btn">
                    <i class="fa fa-shopping-cart"></i>
                    <span>{{Cart::getContent()->count()}}</span>
                  </a>
                </div>
              @endauth
            </div>
          </div>
        </div>
      </nav>
      <div id="search" class="collapse">
        <div class="container">
          <form role="search" class="ml-auto">
            <div class="input-group">
              <input type="text" placeholder="Search" class="form-control">
              <div class="input-group-append">
                <button type="button" class="btn btn-primary"><i class="fa fa-search"></i></button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </header>
    <main>
      @yield('content')
    </main>
    <!--
    *** COPYRIGHT ***
    _________________________________________________________
    -->
  </body>
</html>