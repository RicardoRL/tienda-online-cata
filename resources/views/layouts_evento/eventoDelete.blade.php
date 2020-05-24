@extends('layouts_editor.editorMenu')
@section('content')

<html>
<body>
    <!-- Todos los evento -->
    <div class="breadcrumb-holder">
        <div class="container-fluid">
          <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="/editor">Inicio</a></li>
            <li class="breadcrumb-item active">Eliminar </li>
          </ul>
        </div>
      </div>


      <div class="col-lg-12">
              <div class="card">
                <div class="card-header">
                  <h4>Eventos</h4>
                  <nav class="float-right">
                    <form class="form-inline" action="{{route('evento.scopeDelete')}}" method="POST">
                    @csrf
                      <input name="buscar" class="form-control mr-sm-2" type="search" placeholder="Nombre Evento" aria-label="Search">
                      <button type="submit" class="btn btn-outline-success btn-sm">Buscar</button>
                      </form>
                  </nav>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table">
                      <thead>
                        <tr>
                          <th> ID </th>
                          <th> Evento </th>
                          <th> FECHA </th>
                          <th> SEDE </th>
                          <th> ASISTENTES </th>
                         
                          <th>  </th>
                      </tr>
                      </thead>
                      <tbody>
                      @foreach($eventos as $mievento)
                      @if(auth()->guard('editor')->user()->can('owner', $mievento)) 
                      <tr>
                          <td> {{$mievento->id}}</td>
                          <td> {{$mievento->nombre}} </td>
                          <td> {{$mievento->fecha}} </td>
                          <td> {{$mievento->sede}} </td>
                          <td> {{$mievento->asistentes}} </td>
                         
                          <td>
                              <a class="btn btn-outline-info" 
                                  href="{{route('evento.delete', $mievento->id)}}"
                                  type="submit "role="button">Informacion
                              </a>
                          </td>
                      </tr>
                      @endif
                          @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>

  </body>
</html>

@endsection


