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
                          <th> IMAGE </th>
                          <th>  </th>
                      </tr>
                      </thead>
                      <tbody>
                      @foreach($eventos as $mievento)
                      <tr>
                          <td> {{$mievento->id}}</td>
                          <td> {{$mievento->nombre}} </td>
                          <td> {{$mievento->fecha}} </td>
                          <td> {{$mievento->sede}} </td>
                          <td> {{$mievento->asistentes}} </td>
                          <td> {{$mievento->imagen}}</td>
                          <td>
                              <a class="btn btn-outline-info" 
                                  href="{{route('evento.delete', $mievento->id)}}"
                                  type="submit "role="button">Informacion
                              </a>
                          </td>
                      </tr>
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

