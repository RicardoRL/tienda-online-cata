@extends('layouts_editor.editorMenu')
@section('content')
@include('includes.styledropzone')

<div class="container-fluid">
      <!-- Breadcrumb-->
      <div class="breadcrumb-holder">
        <div class="container-fluid">
          <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('editor.index')}}">Inicio</a></li>
            <li class="breadcrumb-item active">Crear Evento  </li>
          </ul>
        </div>
      </div>
      <section class="forms">
        <div class="container-fluid">
          <!-- Page Header-->
          <header> 
            <h1 class="h3 display">Nuevo Evento  </h1>
          </header>
          <form action="/evento" method="POST" id="upload" role="form" enctype="multipart/form-data"> 
             <!--<form action="/evento" method="POST" class="dropzone" id="my-awesome-dropzone" enctype="multipart/form-data" >  -->
            @csrf
          <div class="col-lg-12">
              <div class="card">
                <div class="card-header d-flex align-items-center">
                  <h4>Formulario para crear nuevo evento</h4>
                </div>

                <div class="card-body">
                  <!--- Nombre Evento-->
                    <div class="form-group row">
                      <label class="col-sm-2 form-control-label">Nombre: </label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" name="nombre" required>
                        @error('nombre')
                                    <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                      </div>
                    </div>
                   <!--- Fecha Evento-->
                    <div class="form-group row">
                      <label class="col-sm-2 form-control-label">Fecha:</label>
                      <div class="col-sm-10">
                        <input type="date" class="form-control" name="fecha" required>
                        @error('fecha')
                                    <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                      </div>
                    </div>
                 <!--- Asistentes Evento-->
                    <div class="form-group row">
                      <label class="col-sm-2 form-control-label">Asistentes: </label>
                      <div class="col-sm-10">
                        <input type="number" class="form-control" name="asistentes" required>
                            
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
                            <option>Guadalajara</option>
                            <option>Zapopan</option>
                            <option>CDMX</option>
                            <option>Monterrey</option>
                        </select>
                      </div>
                    </div>
                    
                    <div class="form-group row">
                      <div class="col-sm-4 offset-sm-2">
                        <a class="btn btn-outline-danger" href="{{route('evento.index')}}" role="button">Cancelar</a>
                        <button type="submit" class="btn btn-outline-success">Crear Evento</button>
                      </div>
                    </div>
      
                </div>
            </div>
            </div>
           

           <div class="col-lg-8">
              <div class="card">
                <div class="card-header d-flex align-items-center">
                  <h4>Agregar Imagen:</h4>
                </div>
                <div class="card-body">
                <div class="custom-file col-md-16 mt-3 mb-3">
                <div >
                        <label for=""> <h4>  </h4> </label> 
                        <input type="file" name="imagen[]" multiple required> 
                    </div>
                    </div>
                </div>
              </div>
            </div>
            </form>
            <script> 
            var form = document.getElementById('upload');
            var request = new  XMLHtppRequest();

            form.addEventListener('submit', function(e){
              e.preventDefault();
              var formdata = new FomrData(form);
              
              request.open('post', '/evento');
              request.addEventListerner("load",transferComplete);
              request.send(formdata);
            });

            functio traferComplete(data){
             consolse.log(data.currentTarget.response);
            }
            </script>
    </div>
     <br><br><br>
        <!--- Footer -->
        <footer class="main-footer">
          <div class="container-fluid">
            <div class="row">
              <div class="col-sm-6">
                <p>CATA &copy; 2020-2023</p>
              </div>
              <div class="col-sm-6 text-right">
                <p>BETA</p>
              </div>
            </div>
          </div>
      </footer>
      </div>
  </body>
</html>
@endsection


      