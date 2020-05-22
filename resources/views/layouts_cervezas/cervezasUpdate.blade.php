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
          <nav class="float-right">
            <form class="form-inline" action="{{route('cerveza.scopeName')}}" method="POST">
            @csrf
              <input name="buscar" class="form-control mr-sm-2" type="search" placeholder="Nombre Cerveza" aria-label="Search">
              <button type="submit" class="btn btn-outline-success btn-sm">Buscar</button>
              </form>
          </nav>

                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table">
                      <thead>
                        <tr>
                          <th> ID </th>
                          <th> Nombre </th>
                          <th> Estilo </th>
                          <th> Aspecto </th>
                          <th> Alcohol </th>
                          <th> Temperatura </th>
                          <th> Maridaje </th>
                          <th> Cantidad </th>
                          <th> Precio </th>
                          <th>   </th>
                      </tr>
                      </thead>
                      <tbody>
                      @foreach($cervezas as $micerveza)
                      <tr>
                          <td> {{$micerveza->id}}</td>
                          <td> {{$micerveza->nombre}} </td>
                          <td> {{$micerveza->estilo}}</td>
                          <td> {{$micerveza->aspecto}} </td>
                          <td> {{$micerveza->alcohol}}</td>
                          <td> {{$micerveza->temp_consumo}} </td>
                          <td> {{$micerveza->maridaje}}</td>
                          <td> {{$micerveza->cantidad}} </td>
                          <td> {{$micerveza->precio}} </td>
                          <td>
                              <a class="btn btn-outline-primary"
                                  href="{{route('cerveza.edit',$micerveza->id)}}" 
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

