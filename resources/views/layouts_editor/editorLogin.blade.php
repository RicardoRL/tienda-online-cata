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
    <div id="top-custom">
        <div class="container">
        </div>
    </div>
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a href="{{route('inicio')}}" class="navbar-brand home">
              <img src="/img/cata-logo.png" alt="CATA logo" class="d-none d-md-inline-block">
              <img src="/img/cata-logo-sm.png" alt="CATA logo" class="d-inline-block d-md-none">
              <span class="sr-only">CATA - go to homepage</span>
            </a>
        <div>
    </nav>
    <div id="all">
        <div id="content">
            <div id="container">
                <div class="row justify-content-center">
                    <div class="col-lg-6">
                        <div class="box-custom" >
                            <h1 class="main-header">Bienvenido(a)</h1>
                            <p class="lead">Ingresa los datos correspondientes
                            para acceder a la interfaz de editor
                            <p>
                            <hr>
                            <form action="{{route('editor.login')}}" method="POST">
                                @csrf
                                <div class="row justify-content-center">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="correo">Correo electrónico</label>
                                            <input id="correo" type="text" class="form-control" name="correo" required>
                                            @error('correo')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row justify-content-center">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="password">Contraseña</label>
                                            <input id="password" type="password" class="form-control" name="password" required>
                                            @error('password')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary"><i class="fa fa-sign-in"></i>Ingresar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
  </body>
</html>