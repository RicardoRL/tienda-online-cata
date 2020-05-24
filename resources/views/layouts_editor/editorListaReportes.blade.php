@extends('layouts_editor.editorMenu')

@section('content')
<div class="col-lg-12">
  <div class="breadcrumb-holder">
    <div class="container-fluid">
      <ul class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('editor.index')}}">Inicio</a></li>
        <li class="breadcrumb-item active">Lista de reportes       </li>
      </ul>
    </div>
  </div>
</div>
<section>
  <div class="col-lg-12">
    <div class="card">
      <div class="card-header">
        <h4>Control de reportes</h4>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-striped">
            <thead>
              <tr>
                <th>Número</th>
                <th>Editor</th>
                <th>Fecha inicio</th>
                <th>Periodo</th>
              </tr>
            </thead>
            <tbody>
              @foreach($reportes as $reporte)
                <tr>
                  <th scope="row">{{$reporte->id}}</th>
                  <td>{{$reporte->editor->id}} 
                      {{$reporte->editor->nombre}} 
                      {{$reporte->editor->apepat}}
                  </td>
                  <td>{{$reporte->fecha_inicio}}</td>
                  <td>{{$reporte->periodo}}</td>
                  <td>
                    <form action="{{route('reporte.select', $reporte->id)}}">
                      <button type="submit" class="btn btn-primary">Ver reporte</button>
                    </form>
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection