@extends('layouts_editor.editorMenu')
@section('content')

<div class="container-fluid">
      <!-- Breadcrumb-->
      <div class="breadcrumb-holder">
        <div class="container-fluid">
          <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('editor.index')}}">Inicio</a></li>
            <li class="breadcrumb-item active">Agregar Editor  </li>
          </ul>
        </div>
      </div>
      <section class="forms">
        <div class="container-fluid">
          <!-- Page Header-->
          <header> 
            <h1 class="h3 display">Nuevo Editor  </h1>
          </header>
        <form action="/editor" method="POST" role="form" enctype="multipart/form-data">
            @csrf
          <div class="col-lg-12">
              <div class="card">
                <div class="card-header d-flex align-items-center">
                  <h4>Formulario Para Crear Un Nuevo Editor</h4>
                </div>

                <div class="card-body">
                  <!--- Nombre Editor-->
                    <div class="form-group row">
                      <label class="col-sm-2 form-control-label">Nombre: </label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" name="nombre" required>
                        @error('nombre')
                                    <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                      </div>
                    </div>
                    <!--- Apellido Paterno Editor-->
                    <div class="form-group row">
                      <label class="col-sm-2 form-control-label">Apellido Paterno: </label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" name="apepat" required>
                        @error('apepat')
                                    <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                      </div>
                    </div>
                    <!--- Apellido Materno Editor-->
                    <div class="form-group row">
                      <label class="col-sm-2 form-control-label">Materno Paterno: </label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" name="apemat" required>
                        @error('apemat')
                                    <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                      </div>
                    </div>
                   <!--- Fecha Nacimiento-->
                    <div class="form-group row">
                      <label class="col-sm-2 form-control-label">Fecha Nacimiento:</label>
                      <div class="col-sm-10">
                        <input type="date" class="form-control" name="fecnac" required>
                        @error('fecnac')
                                    <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                      </div>
                    </div>
                    <!--- Correo Editor-->
                     <div class="form-group row">
                      <label class="col-sm-2 form-control-label">Correo Electronico: </label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" name="correo" required>
                        @error('correo')
                                    <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                      </div>
                    </div>
                     <!--- Correo Editor-->
                     <div class="form-group row">
                      <label class="col-sm-2 form-control-label">Contraseña: </label>
                      <div class="col-sm-10">
                        <input type="password" class="form-control" name="password" required>
                        @error('password')
                                    <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                      </div>
                    </div>
                 

                    
                    <div class="form-group row">
                      <div class="col-sm-4 offset-sm-2">
                        <a class="btn btn-outline-danger" href="{{route('evento.index')}}" role="button">Cancelar</a>
                        <button type="submit" class="btn btn-outline-success">Añadir Editor</button>
                      </div>
                    </div>
                 </div>
              </div>
            </div>
        </form>
    </div>
      </div>
  </body>
</html>
@endsection


      