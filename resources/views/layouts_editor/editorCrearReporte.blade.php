@extends('layouts_editor.editorMenu')

@section('content')
<div class="breadcrumb-holder">
  <div class="container-fluid">
    <ul class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{route('editor.index')}}">Inicio</a></li>
      <li class="breadcrumb-item active">Reportes       </li>
    </ul>
  </div>
</div>
<section>
  <div class="container-fluid top-custom">
    <header> 
      <h1 class="h3 display">Reportes            </h1>
    </header>
    <div class="row">
      <div class="col-lg-6">
        <div class="card">
          <div class="card-header">
            <h4>Creación de reporte de ventas</h4>
          </div>
          <div class="card-body">
            <p>Selecciona el periodo en que quieras generar el reporte de ventas y la fecha de inicio</p>
            <form id="test" action="{{ route('reporte.nuevo') }}" method="POST">
              @csrf
              <input type="hidden" name="editor_id" value="{{auth()->guard('editor')->user()->id}}">
              <select name="periodo" class="col-md-4">
                <option value="semanal">Semanal</option>
                <option value="quincenal">Quincenal</option>
                <option value="mensual">Mensual</option>
              </select>
              <br><br>
              <input type="text" placeholder="AAAA-MM-DD" class="col-md-6" name= "fecha_inicio">
              <br><br>
              <p>
                <button data-style="zoom-in" class="btn btn-primary ladda-button"
                        onclick="event.preventDefault();
                        document.getElementById('test').submit();">
                  <span class="ladda-label">Generar reporte</span>
                </button>
              </p>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- Loading buttons-->
<script src="/vendor2/ladda/spin.min.js"></script>
<script src="/vendor2/ladda/ladda.min.js"></script>
<script src="/js/components-ladda.js"></script>
@endsection