@extends('layouts.header')

@section('content')
<div id="all">
  <div id="content">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <!-- breadcrumb-->
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{route('cliente.index')}}">Inicio</a></li>
              <li aria-current="page" class="breadcrumb-item active">Mi Cuenta</li>
            </ol>
          </nav>
        </div>
        <div class="col-lg-3">
          <!--
          *** CUSTOMER MENU ***
          _________________________________________________________
          -->
          <div class="card sidebar-menu">
            <div class="card-header">
              <h3 class="h4 card-title">Sección del cliente</h3>
            </div>
            <div class="card-body">
              <ul class="nav nav-pills flex-column">
                <a href="#" class="nav-link active"><i class="fa fa-user"></i> Mi cuenta</a>
                <a href="{{route('pedido.showOrders')}}" class="nav-link"><i class="fa fa-list"></i> Mis pedidos</a>
                <a href="{{route('logout')}}" class="nav-link"
                onclick="event.preventDefault();
                document.getElementById('logout-form').submit();"><i class="fa fa-sign-out"></i> Salir</a>
              </ul>
            </div>
          </div>
          <!-- /.col-lg-3-->
          <!-- *** CUSTOMER MENU END ***-->
        </div>
        <div id="checkout" class="col-lg-9">
          <div class="box">
            <h1 class="text-center">Mi Cuenta</h1><br>
            <div class="nav flex-column flex-md-row nav-pills text-center">
              <a href="{{route('cliente.show', [Auth::user()->id])}}" class="nav-link flex-sm-fill text-sm-center">
                <i class="fa fa-map-marker"></i>Mis datos
              </a>
              <a href="{{route('cliente.passwd', [Auth::user()->id])}}" class="nav-link flex-sm-fill text-sm-center">
                <i class="fa fa-truck"></i>Mi contraseña
              </a>
              <a href="{{route('domicilio.show', [Auth::user()->id])}}" class="nav-link flex-sm-fill text-sm-center">
                <i class="fa fa-money"></i>Mi domicilio
              </a>
              <a href="#" class="nav-link flex-sm-fill text-sm-center active">
                <i class="fa fa-eye"></i>Mi tarjeta
              </a>
            </div>
            <div class="content py-3">
              @if(isset($tarjeta->id))
                <form action="{{route('tarjeta.update', $tarjeta->id)}}" method="POST">
                  @csrf
                  @method('PATCH')
              @else
                <form action="{{route('tarjeta.store')}}" method="POST">
                  @csrf
              @endif
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="num_tarjeta">Número de tarjeta</label>
                    <input id="num_tarjeta" type="text" class="form-control"
                    name="num_tarjeta" value="{{$tarjeta->num_tarjeta ?? '' }}">
                    @error('num_tarjeta')
                      <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="banco">Banco</label>
                    <input id="banco" type="text" class="form-control"
                    name="banco" value="{{$tarjeta->banco ?? '' }}">
                    @error('banco')
                      <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                  <label for="tipo">Tipo</label>
                    <input id="tipo" type="text" class="form-control"
                    name="tipo" value="{{$tarjeta->tipo ?? '' }}">
                    @error('tipo')
                      <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="nombre">Nombre</label>
                    <input id="nombre" type="text" class="form-control"
                    name="nombre" value="{{$tarjeta->nombre ?? '' }}">
                    @error('nombre')
                      <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="apellido">Apellido</label>
                    <input id="apellido" type="text" class="form-control"
                    name="apellido" value="{{$tarjeta->apellido ?? '' }}">
                    @error('apellido')
                      <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6 col-lg-3">
                  <div class="form-group">
                    <label for="fecha_exp">Fecha de expiración</label>
                    <input id="fecha_exp" type="text" class="form-control"
                    name="fecha_exp" value="{{$tarjeta->fecha_exp ?? '' }}">
                    @error('fecha_exp')
                      <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                  </div>
                </div>
                <div class="col-md-6 col-lg-3">
                  <div class="form-group">
                    <label for="codigo">Código de seguridad</label>
                    <input id="codigo" type="password" class="form-control"
                    name="codigo" value="{{$tarjeta->codigo ?? '' }}">
                    @error('codigo')
                      <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                  </div>
                </div>
              </div>
              <div class="col-md-12 text-center">
                <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Guardar tarjeta</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>   
@endsection