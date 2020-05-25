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
              <a href="#" class="nav-link flex-sm-fill text-sm-center active">
                <i class="fa fa-truck"></i>Mi contraseña
              </a>
              <a href="{{route('domicilio.show', [Auth::user()->id])}}" class="nav-link flex-sm-fill text-sm-center">
                <i class="fa fa-money"></i>Mi domicilio
              </a>
              <a href="{{route('tarjeta.show', [Auth::user()->id])}}" class="nav-link flex-sm-fill text-sm-center">
                <i class="fa fa-eye"></i>Mi tarjeta
              </a>
            </div>
            <div class="content py-3">
              @if(session()->has('success_message'))
                <div class="alert alert-success" role="alert">
                  {{session()->get('success_message')}}
                </div>
              @elseif(session()->has('error_message'))
                <div class="alert alert-danger" role="alert">
                  {{session()->get('error_message')}}
                </div>
              @endif
              <form action="{{route('cliente.changePassword', ['id' => \Auth::user()->id])}}" method="POST">
                @csrf
                @method('PATCH')
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="password_1">Contraseña nueva</label>
                      <input id="password_1" type="password" class="form-control" name="password">
                      @error('password')
                        <div class="alert alert-danger">{{ $message }}</div>
                      @enderror
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="password_2">Escribe de nuevo tu contraseña</label>
                      <input id="password_2" type="password" class="form-control" name="same_password">
                      @error('same_password')
                        <div class="alert alert-danger">{{ $message }}</div>
                      @enderror
                    </div>
                  </div>
                </div>
                <div class="col-md-12 text-center">
                  <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Guardar nueva contraseña</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection