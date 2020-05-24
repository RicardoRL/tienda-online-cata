@extends('layouts_editor.editorMenu')

@section('content')
<div class="card">
  <div class="card-header">
    <p><h4>Reporte</h4></p>
    <p><strong>Periodo: </strong>{{$datos['fecha_inicio']}} - {{$datos['fecha_final']}}</p>
    <p><strong>Generado por: </strong>{{App\Editor::where('id', $reporte->editor_id)->first()->nombre}} {{App\Editor::where('id', $reporte->editor_id)->first()->apepat}}</p>
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-striped table-sm">
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
<div class="card pie-chart-example">
  <div class="card-header d-flex align-items-center">
    <h4>Top 5</h4>
  </div>
  <div class="card-body">
    <div class="chart-container">
      <canvas id="customChart"></canvas>
    </div>
  </div>
</div>
@isset($reporte)
  @if(\Request::getRequestUri() == '/reporte/select/'.$reporte->id.'?')
    <div class="row justify-content-center">
      <form action="{{route('reporte.pdf')}}">
        <button type="submit" class="btn btn-primary">Exportar</button>
        <input type="hidden" value="{{$reporte->id}}" name="reporte_id">
      </form>
    </div>
  @endif
@endisset
<script type="text/javascript">
  var cerveza1 = "<?= $datos['cervezas_nombre'][0] ?>";
  var cerveza2 = "<?= $datos['cervezas_nombre'][1] ?>";
  var cerveza3 = "<?= $datos['cervezas_nombre'][2] ?>";
  var cerveza4 = "<?= $datos['cervezas_nombre'][3] ?>";
  var cerveza5 = "<?= $datos['cervezas_nombre'][4] ?>";

  var cant1 = "<?= $datos['cervezas_cantidad'][0] ?>";
  var cant2 = "<?= $datos['cervezas_cantidad'][1] ?>";
  var cant3 = "<?= $datos['cervezas_cantidad'][2] ?>";
  var cant4 = "<?= $datos['cervezas_cantidad'][3] ?>";
  var cant5 = "<?= $datos['cervezas_cantidad'][4] ?>";
</script>
<script src="/js/myChart.js" type="text/javascript"></script>
<script src="/js/charts-custom.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels"></script>
@endsection