@extends('layouts.header')

@section('content')
<div id="all">
  <div id="content">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-12">
          <!-- breadcrumb-->
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li aria-current="page" class="breadcrumb-item active">Nueva cuenta / Registrar</li>
            </ol>
          </nav>
        </div>
        <div class="col-lg-6">
          <div class="box">
            @if(session()->has('error_message'))
              <div class="alert alert-danger" role="alert">
                {{session()->get('error_message')}}
              </div>
            @endif
            <h1>Nueva cuenta</h1>
            <p class="lead">¿Aún no te has registrado?</p>
            <p>Regístrate para obtener las mejores promociones y descuentos en nuestros productos.</p>
            <p class="text-muted">Si tienes preguntas o problemas, no dudes en<a href="contact.html"> contactarnos</a>, nuestro personal se pondrá en contacto contigo.</p>
            <hr>
            <form method="POST" action="{{ route('register') }}">
              @csrf
              <div class="form-group">
                <label for="nombre">Nombre</label>
                <input id="nombre" type="text" class="form-control" name="nombre" required>
                @error('nombre')
                  <div class="alert alert-danger">{{ $message }}</div>
                @enderror
              </div>
              <div class="form-group">
                <label for="apepat">Apellido paterno</label>
                <input id="apepat" type="text" class="form-control" name="apepat" required>
                @error('apepat')
                  <div class="alert alert-danger">{{ $message }}</div>
                @enderror
              </div>
              <div class="form-group">
                <label for="apemat">Apellido materno</label>
                <input id="apemat" type="text" class="form-control" name="apemat" required>
                @error('apemat')
                  <div class="alert alert-danger">{{ $message }}</div>
                @enderror
              </div>
              <div class="form-group">
                <label for="fecnac">Fecha de nacimiento</label>
                <input id="fecnac" type="date" class="form-control" name="fecnac" required>
                @error('fecnac')
                  <div class="alert alert-danger">{{ $message }}</div>
                @enderror
              </div>
              <div class="form-group">
                <label for="correo">Correo electrónico</label>
                <input id="correo" type="text" class="form-control" name="correo" required>
                @error('correo')
                  <div class="alert alert-danger">{{ $message }}</div>
                @enderror
              </div>
              <div class="form-group">
                <label for="password">Contraseña</label>
                <input id="password" type="password" class="form-control" name="password" required>
                @error('password')
                  <div class="alert alert-danger">{{ $message }}</div>
                @enderror
              </div>
              <div class="form-group">
                <label for="telefono">Teléfono</label>
                <input id="telefono" type="text" class="form-control" name="telefono" required>
                @error('telefono')
                  <div class="alert alert-danger">{{ $message }}</div>
                @enderror
              </div>  
              <div class="text-center">
                <button type="submit" class="btn btn-primary"><i class="fa fa-user-md"></i>Registrar</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection