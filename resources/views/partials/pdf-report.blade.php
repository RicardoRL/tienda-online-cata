<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>CATA online</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">

    <!--Rutas para mostrar el pdf con formato -->
    <link rel="stylesheet" href="{{asset('css2/style.default.premium.css')}}">
    <link rel="stylesheet" href="{{asset('css/custom.css')}}">
    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href="/vendor2/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome CSS-->
    <link rel="stylesheet" href="/vendor2/font-awesome/css/font-awesome.min.css">
    <!-- Google fonts - Roboto -->
    <link rel="stylesheet" href="/https://fonts.googleapis.com/css?family=Roboto:300,400,500,700">
    <!-- theme stylesheet-->
    <link rel="stylesheet" href="/css2/style.default.premium.css" id="theme-stylesheet">
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="/css/custom.css">
    <!-- Main File-->
    <script src="/js/front2.js"></script>
  </head>
  <body>
    <div class="card">
      <div class="card-header">
        <p><h4>Reporte</h4></p>
        <p><strong>Periodo: </strong>{{$datos['fecha_inicio']}} - {{$datos['fecha_final']}}</p>
        <p><strong>Generado por: </strong>{{App\Editor::where('id', $reporte->editor_id)->first()->nombre}} {{App\Editor::where('id', $reporte->editor_id)->first()->apepat}}</p>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-striped table-sm" id="reporte">
            <thead>
              <tr>
                <th>Id</th>
                <th>Nombre de cerveza</th>
                <th>Cantidad vendida</th>
                <th>Total</th>
              </tr>
            </thead>
            <tbody>
              @for($i=0; $i<$datos['total_cervezas']; $i++)
                <tr>
                  <th scope="row">{{$datos['cervezas_id'][$i]}}</th>
                  <td>{{$datos['cervezas_nombre'][$i]}}</td>
                  <td>{{$datos['cervezas_cantidad'][$i]}}</td>
                  <td>${{$datos['cervezas_monto'][$i]}}.00</td>
                </tr>
              @endfor
              <tr>
                <th scope="row"></th>
                <td></td>
                <td></td>
                <td></td>
              </tr>
              <tr>
                <th scope="row"></th>
                <td></td>
                <td>Productos vendidos: </td>
                <td>{{$datos['total_cervezas_vendidas']}}</td>
              </tr>
              <tr>
                <th scope="row"></th>
                <td></td>
                <td>Total vendido: </td>
                <td>${{$datos['monto_vendido']}}.00</td>
              </tr>
              <tr>
                <th scope="row"></th>
                <td></td>
                <td>Envíos normales: </td>
                <td>{{$datos['envios_normales']}}</td>
              </tr>
              <tr>
                <th scope="row"></th>
                <td></td>
                <td>Envíos exprés: </td>
                <td>{{$datos['envios_expres']}}</td>
              </tr>
              <tr>
                <th scope="row"></th>
                <td></td>
                <td>Pagos con tarjeta: </td>
                <td>{{$datos['pagos_tarjeta']}}</td>
              </tr>
              <tr>
                <th scope="row"></th>
                <td></td>
                <td>Pagos con Paypal: </td>
                <td>{{$datos['pagos_paypal']}}</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </body>
</html>