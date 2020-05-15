
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
    <!-- JavaScript files-->
    <script src="/vendor2/jquery/jquery.min.js"></script>
    <script src="/vendor2/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="/js/grasp_mobile_progress_circle-1.0.0.min.js"></script>
    <script src="/vendor2/jquery.cookie/jquery.cookie.js"> </script>
    <script src="/vendor2/chart.js/Chart.min.js"></script>
    <script src="/vendor2/jquery-validation/jquery.validate.min.js"></script>
    <script src="/vendor2/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="/js/charts-home.js"></script>
    <!-- Notifications
    
    <script src="/vendor2/messenger-hubspot/build/js/messenger.min.js">   </script>
    <script src="/vendor2/messenger-hubspot/build/js/messenger-theme-flat.js">       </script>
    <script src="/js/home-premium.js"> </script>-->
    
    <!-- Main File-->
    <script src="/js/front2.js"></script>
    <!-- Tweaks for older IEs--><!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
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
          <!-- Editores -->

          
          <ul id="side-main-menu" class="side-menu list-unstyled">                  
            <li><a href="{{route('editor.index')}}"><i class="icon-home"></i>Inicio</a></li>
          {{--     @if(\Gate::allows('editor'))  --}}
            <li><a href="#formsDropdow" aria-expanded="false" data-toggle="collapse"> <i class="icon-user"></i>Editores</a>
              <ul id="formsDropdow" class="collapse list-unstyled ">
                <li><a href="{{route('editor.create')}}">Nuevo Editor</a></li>
                <li><a href="/editor/update">Actualizar Editor</a></li>
                <li><a href="/editor/delete">Borrar Editor</a></li>
          {{-- @endif --}}
          </ul>
            </li>
            
            <!-- Eventos -->
          <ul id="side-main-menu" class="side-menu list-unstyled">                  
            <li><a href="#formsDropdown" aria-expanded="false" data-toggle="collapse"> <i class="icon-form"></i>Eventos</a>
              <ul id="formsDropdown" class="collapse list-unstyled ">
                <li><a href="{{route('evento.create')}}">Nuevo evento</a></li>
                <li><a href="{{route('evento.index')}}">Actualizar evento</a></li>
                <li><a href="/evento/delete">Borrar evento</a></li>
          </ul>
            </li>
            <li><a href="#chartsDropdown" aria-expanded="false" data-toggle="collapse"><i class="fa fa-bar-chart"></i>Ventas</a>
              <ul id="chartsDropdown" class="collapse list-unstyled ">
                <li><a href="charts.html">Visualizar ventas</a></li>
                <li><a href="charts-gauge-sparkline.html">Reporte de ventas</a></li>
              </ul>
            </li>
            <li><a href="#tablesDropdown" aria-expanded="false" data-toggle="collapse"> <i class="icon-grid"></i>Tables </a>
              <ul id="tablesDropdown" class="collapse list-unstyled ">
                <li><a href="tables.html">Bootstrap tables</a></li>
                <li><a href="tables-datatable.html">Datatable</a></li>
              </ul>
            </li>
            <li><a href="#componentsDropdown" aria-expanded="false" data-toggle="collapse"> <i class="icon-page"></i>Cuenta</a>
              <ul id="componentsDropdown" class="collapse list-unstyled ">
                <li><a href="components-cards.html">Actualizar información</a></li>
              </ul>
            </li>
            <li><a href="#pagesDropdown" aria-expanded="false" data-toggle="collapse"> <i class="icon-interface-windows"></i>Pages </a>
              <ul id="pagesDropdown" class="collapse list-unstyled ">
                <li><a href="pages-contacts.html">Contacts</a></li>
                <li><a href="pages-invoice.html">Invoice</a></li>
                <li><a href="login.html">Login page</a></li>
                <li><a href="login-2.html">Login v.2 <span class="badge badge-info">New</span></a></li>
                <li><a href="pages-profile.html">Profile</a></li>
                <li><a href="pages-pricing.html">Pricing table</a></li>
              </ul>
            </li>
            <li> <a href="#"> <i class="icon-mail"></i>Demo
                <div class="badge badge-warning">6 New</div></a></li>
          </ul>
        </div>
        <!--
        <div class="admin-menu">
          <h5 class="sidenav-heading">Second menu</h5>
          <ul id="side-admin-menu" class="side-menu list-unstyled"> 
            <li> <a href="#"> <i class="icon-screen"> </i>Demo</a></li>
            <li> <a href="#"> <i class="icon-flask"> </i>Demo
                <div class="badge badge-info">Special</div></a></li>
            <li> <a href=""> <i class="icon-flask"> </i>Demo</a></li>
            <li> <a href=""> <i class="icon-picture"> </i>Demo</a></li>
          </ul>
        </div>
        -->
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
                  <!-- Languages dropdown    -->
                  <li class="nav-item dropdown"><a id="languages" rel="nofollow" data-target="#" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link language dropdown-toggle"><img src="img/flags/16/GB.png" alt="English"><span class="d-none d-sm-inline-block">English</span></a>
                    <ul aria-labelledby="languages" class="dropdown-menu">
                      <li><a rel="nofollow" href="#" class="dropdown-item"> <img src="img/flags/16/DE.png" alt="English" class="mr-2"><span>German</span></a></li>
                      <li><a rel="nofollow" href="#" class="dropdown-item"> <img src="img/flags/16/FR.png" alt="English" class="mr-2"><span>French                                                         </span></a></li>
                    </ul>
                  </li>
                  <!-- Log out-->
                  <li class="nav-item"><a href="{{route('editor.login')}}" class="nav-link logout"> <span class="d-none d-sm-inline-block">Logout</span><i class="fa fa-sign-out"></i></a></li>
                </ul>
              </div>
            </div>
          </nav>
        </header>
        <main>
        @extends('layouts_editor.editorAlertas')
        
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