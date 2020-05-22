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
                  <h4>Editores</h4>
                  <nav class="navbar navbar-light bg-light float-right">
                    <form class="form-inline" action="{{route('editor.scopeName')}}" method="POST">
                    @csrf
                      <input name="buscar" class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
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
                          <th> APEPAT </th>
                          <th> APEMAT </th>
                          <th> FECNAC </th>
                          <th> CORREO </th>
                          <th>  </th>
                      </tr>
                      </thead>
                      <tbody>
                      @foreach($editores as $mieditor)
                      <tr>
                          <td> {{$mieditor->id}}</td>
                          <td> {{$mieditor->nombre}} </td>
                          <td> {{$mieditor->apepat}} </td>
                          <td> {{$mieditor->apemat}} </td>
                          <td> {{$mieditor->fecnac}} </td>
                          <td> {{$mieditor->correo}}</td>
                          <td>
                              <a class="btn btn-outline-primary"
                                  href="{{route('editor.edit',$mieditor->id)}}" 
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

