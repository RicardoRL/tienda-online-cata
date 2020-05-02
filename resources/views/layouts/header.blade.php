<?php
//$cervecerias = mostrarCerveceriasMenu();
$cervecerias = mostrarCerveceriasMenu();
$estilos = mostrarEstilosMenu();
if(isset($estilos))
{
  /*$grupo1 = $cervecerias[0];
  $grupo2 = $cervecerias[1];
  $grupo3 = $cervecerias[2];
  $grupo4 = $cervecerias[3];*/

  $estilos1 = $estilos[0];
  $estilos2 = $estilos[1];
  $estilos3 = $estilos[2];
  $estilos4 = $estilos[3];
  
  /*$c1 = count($grupo1);
  $c2 = count($grupo2);
  $c3 = count($grupo3);
  $c4 = count($grupo4);*/

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

    @stack('script-update-cart')
  </head>
  <body>
    <!-- navbar-->
    <header class="header mb-5">
      <!--TOPBAR-->
      <div id="top">
        <!-- LOGIN AND REGISTRATION -->
        @include('partials.login-register')
        <!-- LOGIN MODAL -->
        @include('partials.login-client')
      </div><!-- *** TOP BAR END ***-->
      <nav class="navbar navbar-expand-lg">
        <div class="container">
          @include('partials.logo')
          <div id="navigation" class="collapse navbar-collapse">
            <ul class="navbar-nav mr-auto">
              @guest
                <li class="nav-item"><a href="{{route('inicio')}}" class="nav-link">Inicio</a></li>
              @else
                <li class="nav-item"><a href="{{route('cliente.index')}}" class="nav-link">Inicio</a></li>
              @endguest

              @include('partials.menus.cervecerias-menu')
              @include('partials.menus.estilos-menu')
            </ul>
            @include('partials.navbar-buttons')
          </div>
        </div>
      </nav>
      @include('partials.search')
    </header>
    <main>
      @yield('content')
    </main>
  </body>
</html>