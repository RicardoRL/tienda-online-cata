@extends('layouts_editor.editorMenu')
@section('content')

<html>
<body>
<link href="{{ asset('css/font-awesome/all.css') }}" rel="stylesheet">
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
                  <h4>Cervecerias</h4>
                  <nav class="float-right">
                    <form class="form-inline" action="{{route('cerveza.scopeDelete')}}" method="POST">
                    @csrf
                      <input name="buscar" class="form-control mr-sm-2" type="search" placeholder="Nombre Cerveza" aria-label="Search">
                      <button type="submit" class="btn btn-outline-success btn-sm">Buscar</button>
                      </form>
                  </nav>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th> ID </th>
                          <th> NOMBRE </th>
                          <th> Estilo </th>
                          <th> Aspecto </th>
                          <th> Temperatura </th>
                          <th> Maridaje </th>
                          <th> Precio </th>
                          <th> Cantidad </th>
                      </tr>
                      </thead>
                      <tbody>
                      @foreach($cervezas as $micerveza)
                      <tr>
                          <td> {{$micerveza->id}}</td>
                          <td> {{$micerveza->nombre}} </td>
                          <td> {{$micerveza->estilo}} </td>
                          <td> {{$micerveza->aspecto}} </td>
                          <td> {{$micerveza->temp_consumo}} </td> 
                          <td> {{$micerveza->maridaje}}</td> 
                          <td> {{$micerveza->precio}} </td> 
                          <td> {{$micerveza->cantidad}}</td> 
                          <td>
                              <a
                                 href="{{route('cerveza.show',$micerveza->id)}}" >
                               <i class="fas fa-info-circle"></i>
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



