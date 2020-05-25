
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
    <link rel="stylesheet" href="/vendor2/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome CSS-->
    <link rel="stylesheet" href="/vendor2/font-awesome/css/font-awesome.min.css">
    <!-- Fontastic Custom icon font-->
    <link rel="stylesheet" href="/css2/fontastic.css">
    <!-- Google fonts - Roboto -->
    <link rel="stylesheet" href="/https://fonts.googleapis.com/css?family=Roboto:300,400,500,700">
    <!-- jQuery Circle-->
    <link rel="stylesheet" href="/css2/grasp_mobile_progress_circle-1.0.0.min.css">
    <!-- Custom Scrollbar-->
    <link rel="stylesheet" href="/vendor2/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.css">
    <!-- theme stylesheet-->
    <link rel="stylesheet" href="/css2/style.default.premium.css" id="theme-stylesheet">
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="/css/custom.css">
    <!-- Favicon-->
    <link rel="shortcut icon" href="/img/favicon.ico">
    <!-- Ladda-->
    <link rel="stylesheet" href="/vendor2/ladda/ladda-themeless.min.css">
    <!-- jQuery Circle-->
    <link rel="stylesheet" href="/css2/grasp_mobile_progress_circle-1.0.0.min.css">
    <!-- JavaScript files-->
    <script src="/vendor2/jquery/jquery.min.js"></script>
    <script src="/vendor2/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="/js/grasp_mobile_progress_circle-1.0.0.min.js"></script>
    <script src="/vendor2/jquery.cookie/jquery.cookie.js"> </script>
    <script src="/vendor2/chart.js/Chart.min.js"></script>
    <script src="/vendor2/jquery-validation/jquery.validate.min.js"></script>
    <script src="/vendor2/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js"></script>
    <!-- Main File-->
    <script src="/js/charts-home.js"></script>
    <script src="/js/front2.js"></script>
  </head>
  <body>
    <!-- Side Navbar -->
    <nav class="side-navbar">
      <div class="side-navbar-wrapper">
        <!-- Sidebar Header    -->
        <div class="sidenav-header d-flex align-items-center justify-content-center">
          <!-- User Info-->
          <div class="sidenav-header-inner text-center"><a href="pages-profile.html"></a>
            <h2 class="h5">{{auth()->guard('editor')->user()->nombre}}</h2>
            <span>Editor {{auth()->guard('editor')->user()->id}}</span>
          </div>
          <!-- Small Brand information, appears on minimized sidebar-->
          <div class="sidenav-header-logo"><a href="index.html" class="brand-small text-center"> <strong>C</strong><strong class="text-primary">D</strong></a></div>
        </div>
        <!-- Sidebar Navigation Menus-->
        <div class="main-menu">
          <h5 class="sidenav-heading">Menú</h5>
          <ul id="side-main-menu" class="side-menu list-unstyled">
            <!-- Editores -->             
            <li><a href="{{route('editor.index')}}"><i class="icon-home"></i>Inicio</a></li>
            @if(auth()->guard('editor')->user()->can('isAdmin', $admin))
              <li><a href="#opcionesEditor" aria-expanded="false" data-toggle="collapse"> <i class="icon-user"></i>Editores</a>
                <ul id="opcionesEditor" class="collapse list-unstyled ">
                  <li><a href="{{route('editor.create')}}">Nuevo Editor</a></li>
                  <li><a href="{{route('editor.updateList')}}">Actualizar Editor</a></li>
                  <li><a href="{{route('editor.deleteList')}}">Borrar Editor</a></li>
                </ul>
              </li>
            @endif
            <!-- Eventos -->                
            <li><a href="#opcionesEvento" aria-expanded="false" data-toggle="collapse"> <i class="icon-picture"></i>Eventos</a>
              <ul id="opcionesEvento" class="collapse list-unstyled ">
                <li><a href="{{route('evento.create')}}">Nuevo evento</a></li>
                <li><a href="{{route('evento.index')}}">Actualizar evento</a></li>
                <li><a href="{{route('evento.deleteList')}}">Borrar evento</a></li>
              </ul>
            </li>
            <!-- Cervecerias -->
            <li><a href="#opcionesCerveceria" aria-expanded="false" data-toggle="collapse"><i class="icon-form" ></i>Cervecerías</a>
              <ul id="opcionesCerveceria" class="collapse list-unstyled ">
                <li><a href="{{route('cerveceria.create')}}">Agregar Cervecería</a></li>
                <li><a href="{{route('cerveceria.index')}}">Actualizar Cervecería</a></li>
                <li><a href="{{route('cerveceria.delete')}}">Eliminar Cervecería</a></li>
              </ul>
            </li>
            <!-- Cervecerias -->
            <li><a href="#opcionesCerveza" aria-expanded="false" data-toggle="collapse"> <i class="icon-flask"></i>Cervezas </a>
              <ul id="opcionesCerveza" class="collapse list-unstyled ">
                <li><a href="{{route('cerveza.create')}}">Agregar Cerveza</a></li>
                <li><a href="{{route('cerveza.updateList')}}">Actualizar Cerveza</a></li>
                <li><a href="{{route('cerveza.deleteList')}}">Eliminar Cerveza</a></li>
              </ul>
            </li>
            <li><a href="#pagesDropdown" aria-expanded="false" data-toggle="collapse"> <i class="icon-line-chart"></i>Reportes </a>
              <ul id="pagesDropdown" class="collapse list-unstyled ">
                <li><a href="{{route('reporte.index')}}">Generar reporte</a></li>
                <li><a href="{{route('reporte.list')}}">Exportar reporte</a></li>
              </ul>
            </li>
            <!--
            <li><a href="#opcionesGenerales" aria-expanded="false" data-toggle="collapse"> <i class="icon-user"></i>Cuenta</a>
              <ul id="opcionesGenerales" class="collapse list-unstyled ">
                <li><a href="#">Actualizar información</a></li>
              </ul>
            </li>
            -->
          </ul>
        </div>
      </div>
    </nav>
    <div class="page">
      <header class="header">
          <nav class="navbar">
            <div class="container-fluid">
              <div class="navbar-holder d-flex align-items-center justify-content-between">
                <div class="navbar-header"><a id="toggle-btn" href="#" class="menu-btn"><i class="icon-bars"> </i></a><a href="index.html" class="navbar-brand">
                    <div class="brand-text d-none d-md-inline-block"><span>CATA</span><strong class="text-primary"> Designer</strong></div></a></div>
                <ul class="nav-menu list-unstyled d-flex flex-md-row align-items-md-center">
                  <!-- Notifications dropdown-->
                  <li class="nav-item dropdown"> <a id="notifications" rel="nofollow" data-target="#" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link"><i class="fa fa-bell"></i><span class="badge badge-warning">12</span></a>
                    <ul aria-labelledby="notifications" class="dropdown-menu">
                      <li><a rel="nofollow" href="#" class="dropdown-item"> 
                          <div class="notification d-flex justify-content-between">
                            <div class="notification-content"><i class="fa fa-envelope"></i>You have 6 new messages </div>
                            <div class="notification-time"><small>4 minutes ago</small></div>
                          </div></a></li>
                      <li><a rel="nofollow" href="#" class="dropdown-item"> 
                          <div class="notification d-flex justify-content-between">
                            <div class="notification-content"><i class="fa fa-twitter"></i>You have 2 followers</div>
                            <div class="notification-time"><small>4 minutes ago</small></div>
                          </div></a></li>
                      <li><a rel="nofollow" href="#" class="dropdown-item"> 
                          <div class="notification d-flex justify-content-between">
                            <div class="notification-content"><i class="fa fa-upload"></i>Server Rebooted</div>
                            <div class="notification-time"><small>4 minutes ago</small></div>
                          </div></a></li>
                      <li><a rel="nofollow" href="#" class="dropdown-item"> 
                          <div class="notification d-flex justify-content-between">
                            <div class="notification-content"><i class="fa fa-twitter"></i>You have 2 followers</div>
                            <div class="notification-time"><small>10 minutes ago</small></div>
                          </div></a></li>
                      <li><a rel="nofollow" href="#" class="dropdown-item all-notifications text-center"> <strong> <i class="fa fa-bell"></i>view all notifications                                            </strong></a></li>
                    </ul>
                  </li>
                  <!-- Messages dropdown-->
                  <li class="nav-item dropdown"> <a id="messages" rel="nofollow" data-target="#" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link"><i class="fa fa-envelope"></i><span class="badge badge-info">10</span></a>
                    <ul aria-labelledby="notifications" class="dropdown-menu">
                      <li><a rel="nofollow" href="#" class="dropdown-item d-flex"> 
                          <div class="msg-profile"> <img src="img/avatar-1.jpg" alt="..." class="img-fluid rounded-circle"></div>
                          <div class="msg-body">
                            <h3 class="h5">Jason Doe</h3><span>sent you a direct message</span><small>3 days ago at 7:58 pm - 10.06.2014</small>
                          </div></a></li>
                      <li><a rel="nofollow" href="#" class="dropdown-item d-flex"> 
                          <div class="msg-profile"> <img src="img/avatar-2.jpg" alt="..." class="img-fluid rounded-circle"></div>
                          <div class="msg-body">
                            <h3 class="h5">Frank Williams</h3><span>sent you a direct message</span><small>3 days ago at 7:58 pm - 10.06.2014</small>
                          </div></a></li>
                      <li><a rel="nofollow" href="#" class="dropdown-item d-flex"> 
                          <div class="msg-profile"> <img src="img/avatar-3.jpg" alt="..." class="img-fluid rounded-circle"></div>
                          <div class="msg-body">
                            <h3 class="h5">Ashley Wood</h3><span>sent you a direct message</span><small>3 days ago at 7:58 pm - 10.06.2014</small>
                          </div></a></li>
                      <li><a rel="nofollow" href="#" class="dropdown-item all-notifications text-center"> <strong> <i class="fa fa-envelope"></i>Read all messages    </strong></a></li>
                    </ul>
                  </li>
                  <!-- Log out-->
                  <li class="nav-item">
                    <a href="{{route('editor.logout')}}" 
                       class="nav-link logout"
                       onclick="event.preventDefault(); document.getElementById('editor-logout-form').submit();">
                      <span class="d-none d-sm-inline-block">Logout</span>
                      <i class="fa fa-sign-out"></i>
                    </a>
                  </li>
                  <form id="editor-logout-form" action="{{ route('editor.logout') }}" method="POST" style="display: none;">
                    @csrf
                  </form>
                </ul>
              </div>
            </div>
          </nav>
        </header>
        <main>
          @include('layouts_editor.editorAlertas')
          @yield('content')
        </main>
        <footer class="main-footer">
          <div class="container-fluid">
            <div class="row">
              <div class="col-sm-6">
                <p>CATA &copy; 2020-2023</p>
              </div>
              <div class="col-sm-6 text-right">
                <p>BETA</p>
              </div>
            </div>
          </div>
      </footer>
    </div>
  </body>
</html>