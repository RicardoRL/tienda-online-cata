@extends('layouts_editor.editorMenu')
@section('content')

<div class="container-fluid">
      <!-- Breadcrumb-->
      <div class="breadcrumb-holder">
        <div class="container-fluid">
          <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('editor.index')}}">Inicio</a></li>
            <li class="breadcrumb-item active">Agregar Cerveza  </li>
          </ul>
        </div>
      </div>
      <section class="forms">
        <div class="container-fluid">
          <!-- Page Header-->
          <header> 
            <h1 class="h3 display">Nuevo Cerveza  </h1>
          </header>
        <form action="{{route('cerveza.store')}}" method="POST" role="form" enctype="multipart/form-data">
            @csrf
          <div class="col-lg-12">
              <div class="card">
                <div class="card-header d-flex align-items-center">
                  <h4>Formulario Para Agregar nueva Cerveza</h4>
                </div>

                <div class="card-body">

                <!--- Tipo Cerveceria id -->
                <div class="form-group row">
                      <label class="col-sm-2 form-control-label">Cerveceria: </label>
                      <div class="col-sm-10">
                            {!! Form::select('cerveceria_id', $cervecerias,null, ['class' => 'form-control'])!!}
                      </div>
                    </div>

                  <!--- Nombre Cerveza-->
                    <div class="form-group row">
                      <label class="col-sm-2 form-control-label">Nombre: </label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" placeholder="Acapulco Beer" name="nombre" required>
                        @error('nombre')
                                    <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                      </div>
                    </div>
                    
                    <!--- Estilo Cerveza-->
                    <div class="form-group row">
                      <label class="col-sm-2 form-control-label">Estilo: </label>
                      <div class="col-sm-10 mb-3">
                      <select name="estilo">
                        @for($i = 0; $i<$total; $i++)
                          <option name="estilo" value="{{$estilo[$i]->estilo}}">{{$estilo[$i]->estilo}}</option>
                        @endfor
                      </select>
                      </div>
                    </div>

                    <!--- Aspecto Cerveza-->
                    <div class="form-group row"> 
                      <label class="col-sm-2 form-control-label">Aspecto: </label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" placeholder="aspecto" name="aspecto" required>
                        @error('aspecto')
                                    <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                      </div>
                    </div>

                     <!--- Sabor o Aroma Cerveza-->
                     <div class="form-group row">
                      <label class="col-sm-2 form-control-label">Sabor/Aroma: </label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" placeholder="Aroma Frutales" name="sabor_aroma" required>
                        @error('sabor_aroma')
                                    <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                      </div>
                    </div>

                    <!--- Alcohol Cerveza-->
                    <div class="form-group row">
                      <label class="col-sm-2 form-control-label">Alcohol: </label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" placeholder="5.15 %" name="alcohol" required>
                        @error('alcohol')
                                    <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                      </div>
                    </div>

                    <!--- temp_consumo Cerveza-->
                    <div class="form-group row">
                      <label class="col-sm-2 form-control-label">Temperatura de consumo: </label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" placeholder="60 " name="temp_consumo" required>
                        @error('temp_consumo')
                                    <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                      </div>
                    </div>

                    <!--- Aspecto Cerveza-->
                    <div class="form-group row">
                      <label class="col-sm-2 form-control-label">Maridaje: </label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" placeholder="maridaje" name="maridaje" required>
                        @error('maridaje')
                                    <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                      </div>
                    </div>

                    <!--- Presentacion Cerveza-->
                    <div class="form-group row">
                      <label class="col-sm-2 form-control-label">Presentacion: </label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" placeholder="presentacion" name="presentacion" required>
                        @error('presentacion')
                                    <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                      </div>
                    </div>

                     <!--- Presentacion Cerveza-->
                     <div class="form-group row">
                      <label class="col-sm-2 form-control-label">Precio: </label>
                      <div class="col-sm-10">
                        <input type="number" class="form-control" placeholder="precio" name="precio" required>
                        @error('precio')
                                    <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                      </div>
                    </div>

                    <!--- Presentacion Cerveza-->
                    <div class="form-group row">
                      <label class="col-sm-2 form-control-label">Cantidad: </label>
                      <div class="col-sm-10">
                        <input type="number" class="form-control" placeholder="10" name="cantidad" required>
                        @error('cantidad')
                                    <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                      </div>
                    </div>

                    <!--- Tipo Cerveceza -->
                    <div class="form-group row">
                      <label class="col-sm-2 form-control-label">Tipo: </label>
                      <div class="col-sm-10 mb-3">
                        <select name="tipo" class="form-control">
                            <option>mexicanas</option>
                            <option>importadas</option>
                        </select>
                      </div>
                    </div>
         {{--
                    <!--- Ciudad Cerveceria -->
                    <div class="form-group row">
                      <label class="col-sm-2 form-control-label">Ciudad: </label>
                      <div class="col-sm-10 mb-3">
                        <select name="ciudad" class="form-control">
                            <option>Guadalajara</option>
                            <option>Zapopan</option>
                            <option>CDMX</option>
                            <option>Monterrey</option>
                        </select>
                      </div>
                    </div>

                     <!--- Sitio Web Cerveceria-->
                     <div class="form-group row">
                      <label class="col-sm-2 form-control-label">Sitio Web: </label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" name="sitio_web" placeholder="Ejemplo: www.facebook.com"required>
                        @error('sitio_web')
                                    <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                      </div>
                    </div>

                     <!--- Contacto Cerveceria-->
                     <div class="form-group row">
                      <label class="col-sm-2 form-control-label">Contacto: </label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" name="contacto" placeholder="3312345678"required>
                        @error('contacto')
                                    <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                      </div>
                    </div>
          --}}
                    
                    <div class="form-group row">
                      <div class="col-sm-4 offset-sm-2">
                        <a class="btn btn-outline-danger" href="{{route('editor.index')}}" role="button">Cancelar</a>
                        <button type="submit" class="btn btn-outline-success">Añadir Cerveza</button>
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
                <div class="col-sm-10">
                        <label for=""> <h4>  </h4> </label> 
                        <input type="file" name="imagen" style="text-align:right"> 
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


      