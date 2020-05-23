@extends('layouts_editor.editorMenu')
@section('content')

<div class="container-fluid">
      <!-- Breadcrumb-->
      <div class="breadcrumb-holder">
        <div class="container-fluid">
          <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="/editor">Inicio</a></li>
            <li class="breadcrumb-item active">Actualizar Evento  </li>
          </ul>
        </div>
      </div>
      <section class="forms">
        <div class="container-fluid">
          <!-- Page Header-->
          <header> 
            <h1 class="h3 display">Actualizar Formulario          </h1>
          </header>
        <form action="/evento/{{$evento->id}}" method="POST" role="form" enctype="multipart/form-data">
            @csrf
          <div class="col-lg-12">
              <div class="card">
                <div class="card-header d-flex align-items-center">
                  <h4>Actualizar formulario del evento</h4>
                </div>

                <div class="card-body">
                  <!--- Nombre Evento-->
                    <div class="form-group row">
                      <label class="col-sm-2 form-control-label">Nombre: </label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" disabled name="nombre" value="{{$evento->nombre}}">
                        <input type="hidden" name="_method" value="PUT">     
                        @error('nombre')
                                    <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                      </div>
                    </div>
                   <!--- Fecha Evento-->
                    <div class="form-group row">
                      <label class="col-sm-2 form-control-label">Fecha:</label>
                      <div class="col-sm-10">
                        <input type="date" class="form-control" name="fecha" value="{{$evento->fecha}}" >
                        @error('fecha')
                                    <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                      </div>
                    </div>
                 <!--- Asistentes Evento-->
                    <div class="form-group row">
                      <label class="col-sm-2 form-control-label">Asistentes: </label>
                      <div class="col-sm-10">
                        <input type="number" class="form-control" name="asistentes" value="{{$evento->asistentes}}">
                            
                            @error('asistentes')
                                    <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>   

                    <!--- Sede Evento-->
                    <div class="form-group row">
                      <label class="col-sm-2 form-control-label">Sede: </label>
                      <div class="col-sm-10 mb-3">
                        <select name="sede" class="form-control">
                            <option {{ $evento->sede == "Guadalajara" ? 'selected' : '' }}>Guadalajara</option>
                            <option {{ $evento->sede == "Zapopan" ? 'selected' : '' }}>Zapopan</option>
                            <option {{ $evento->sede == "CDMX" ? 'selected' : '' }}>CDMX</option>
                            <option {{ $evento->sede == "Monterrey" ? 'selected' : '' }}>Monterrey</option>
                        </select>
                      </div>
                    </div>
                    
                    <div class="form-group row">
                      <div class="col-sm-4 offset-sm-2">
                        <a class="btn btn-outline-danger" href="{{route('evento.index')}}" role="button">Cancelar</a>
                        <button type="submit" class="btn btn-outline-success">Guardar cambios</button>
                      </div>
                    </div>
      
                </div>
            </div>
            </div>
            
        <div class="row">
  {{-- 
            <!-- Imagen Nueva -->
            <div class="col-lg-7">
              <div class="card">
                <div class="card-header d-flex align-items-center">
                  <h4>Nueva Imagen</h4>
                </div>
                <div class="card-body">
                <div class="custom-file col-md-16 mt-3 mb-3">
                <div class="col-sm-10">
                        <label for=""> <h4> Actualizar imagen: </h4> </label> 
                        <input type="file" name="imagen" style="text-align:right"> 
                    </div>
                    </div>
                </div>
              </div>
            </div>

            <!-- Imagen Actual -->
            <div class="col-lg-5">
                <div class="card">
                    <div class="card-header d-flex align-items-center">
                        <h4>Imagen actual:</h4> <input type="text" disabled name="nombre_imagen" value="{{$evento->imagen}}"> 
                    </div>
                    <div class="col-sm-10">
                         <br><img src="{{asset('eventos/'.$evento->imagen)}}" height="200" width="300"><br><br>
                    </div>
                </div>
            </div>
            --}}
        </form>
    </div>

    @endsection