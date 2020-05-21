@extends('layouts_editor.editorMenu')
@section('content')

<html>
<body>
    <!-- Todos los evento -->
    <div class="breadcrumb-holder">
        <div class="container-fluid">
          <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="/editor">Inicio</a></li>
            <li class="breadcrumb-item active">Actualizar </li>
          </ul>
        </div>
      </div>


      <div class="col-lg-12">
              <div class="card">
                <div class="card-header">
                  <h4>Cervezas</h4>
          <nav class="navbar navbar-light bg-light float-right">

            <form class="form-inline" action="{{route('cerveza.scopeName')}}" method="POST">
            @csrf
              <input name="buscar" class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
              <button type="submit" class="btn btn-outline-success btn-sm">Buscar</button>
              </form>
          </nav>

                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table">
                      <thead>
                        <tr>
                          <th scope="col"> ID </th>
                          <th> Nombre </th>
                          <th>  Boton </th>
                      </tr>
                      </thead>
                      <tbody>
                      @foreach($cervezas as $micerveza)
                      <tr>
                          <td scope="row"> {{$micerveza->id}}</td>
                          <td> {{$micerveza->nombre}} </td>
                          <td>
                              <a class="btn btn-outline-primary"
                                  href="{{route('evento.edit',$micerveza->id)}}" 
                                  type="button">Actualizar
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

