@extends('layouts_editor.editorMenu')
@section('content')

<div class="container-fluid">
      <!-- Breadcrumb-->
      <div class="breadcrumb-holder">
        <div class="container-fluid">
          <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('editor.index')}}">Inicio</a></li>
            <li class="breadcrumb-item active">Eliminar Cerveceria  </li>
          </ul>
        </div>
      </div>
      <section class="forms">
        <div class="container-fluid">
          <!-- Page Header-->
          <header> 
            <h1 class="h3 display">Eliminar Cerveceria  </h1>
          </header>
        <form action="/cerveceria/{{$cerveceria->id}}" method="POST" role="form" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="_method" value="DELETE">
          <div class="col-lg-12">
              <div class="card">
                <div class="card-header d-flex align-items-center">
                  <h4>Datos de la cerveceria</h4>
                </div>

                <div class="card-body">
                  <!--- Nombre Cerveceria-->
                    <div class="form-group row">
                      <label class="col-sm-2 form-control-label">Nombre: </label>
                      <div class="col-sm-10">
                        <input type="text" disabled class="form-control" placeholder="Acapulco Beer" name="nombre" value="{{$cerveceria->nombre}}" required>
                        @error('nombre')
                                    <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                      </div>
                    </div>

                    <!--- Ciudad Cerveceria -->
                    <div class="form-group row">
                      <label class="col-sm-2 form-control-label">Ciudad: </label>
                      <div class="col-sm-10 mb-3">
                        <select name="ciudad" disabled class="form-control">
                            <option {{ $cerveceria->ciudad == "Guadalajara" ? 'selected' : '' }}>Guadalajara</option>
                            <option {{ $cerveceria->ciudad == "Zapopan" ? 'selected' : '' }}>Zapopan</option>
                            <option {{ $cerveceria->ciudad == "CDMX" ? 'selected' : '' }}>CDMX</option>
                            <option {{ $cerveceria->ciudad == "Monterrey" ? 'selected' : '' }}>Monterrey</option>
                        </select>
                      </div>
                    </div>

                     <!--- Sitio Web Cerveceria-->
                     <div class="form-group row">
                      <label class="col-sm-2 form-control-label">Sitio Web: </label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" disabled name="sitio_web" placeholder="Ejemplo: www.facebook.com" value="{{$cerveceria->sitio_web}}" required>
                        @error('sitio_web')
                                    <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                      </div>
                    </div>

                     <!--- Contacto Cerveceria-->
                     <div class="form-group row">
                      <label class="col-sm-2 form-control-label">Contacto: </label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" disabled name="contacto" placeholder="3312345678" value="{{$cerveceria->contacto}}" required>
                        @error('contacto')
                                    <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                      </div>
                    </div>
                {{-- 
                    <!--- Tipo Cerveceza -->
                    <div class="form-group row">
                      <label class="col-sm-2 form-control-label">Tipo: </label>
                      <div class="col-sm-10 mb-3">
                        <select name="tipo" disabled class="form-control">
                            <option>mexicanas</option>
                            <option>importadas</option>
                        </select>
                      </div>
                    </div>
                 --}}
                    
                    <div class="form-group row">
                      <div class="col-sm-4 offset-sm-2">
                        <a class="btn btn-secondary" href="/cerveceria/delete" role="button">Cancelar</a>
                        <button type="submit" class="btn btn-outline-danger">Eliminar Cerveceria</button>
                      </div>
                    </div>
                 </div>
              </div>
            </div>
                    {{-- 
            <div class="col-lg-8">
              <div class="card">
                <div class="card-header d-flex align-items-center">
                  <h4>Agregar Imagen:</h4>
                </div>
                <div class="card-body">
                <div class="custom-file col-md-16 mt-3 mb-3">
                <div class="col-sm-10">
                        <label for=""> <h4>  </h4> </label> 
                        <input type="file" disabled name="imagen" style="text-align:right" value="{{$cerveceria->imagen}}"> 
                    </div>
                    </div>
                </div>
              </div>
            </div> --}}

         </form>
        </div>
      </div>
  </body>
</html>
@endsection