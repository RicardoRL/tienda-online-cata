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
                <a href="#" class="nav-link flex-sm-fill text-sm-center active">
                    <i class="fa fa-money"></i>Mi domicilio
                </a>
                <a href="{{route('tarjeta.show', [Auth::user()->id])}}" class="nav-link flex-sm-fill text-sm-center">
                    <i class="fa fa-eye"></i>Mi tarjeta
                </a>
              </div>
              <div class="content py-3">
                @if(isset($domicilio->id))
                  <form action="{{route('domicilio.update', $domicilio->id)}}" method="POST">
                    @csrf
                    @method('PATCH')
                @else
                  <form action="{{route('domicilio.store')}}" method="POST">
                    @csrf
                @endif
                <div class="row">
                  <div class="col-md-6 col-lg-3">
                    <div class="form-group">
                      <label for="codpos">Código postal</label>
                      <input id="codpos" type="text" class="form-control"  
                      name="codigo_postal" value="{{$domicilio->codigo_postal ?? '' }}">
                      @error('codpos')
                        <div class="alert alert-danger">{{ $message }}</div>
                      @enderror
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="estado">Estado</label>
                      <input id="estado" type="text" class="form-control"
                      name="estado" value="{{$domicilio->estado ?? '' }}">
                      @error('estado')
                          <div class="alert alert-danger">{{ $message }}</div>
                      @enderror
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="ciudad">Ciudad</label>
                      <input id="ciudad" type="text" class="form-control"
                      name="ciudad" value="{{$domicilio->ciudad ?? '' }}">
                      @error('ciudad')
                        <div class="alert alert-danger">{{ $message }}</div>
                      @enderror
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="colonia">Colonia</label>
                      <input id="colonia" type="text" class="form-control"
                      name="colonia" value="{{$domicilio->colonia ?? '' }}">
                      @error('colonia')
                        <div class="alert alert-danger">{{ $message }}</div>
                      @enderror
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="calle_principal">Calle principal</label>
                      <input id="calle_principal" type="text" class="form-control"
                      name="calle_principal" value="{{$domicilio->calle_principal ?? '' }}">
                      @error('calle_principal')
                        <div class="alert alert-danger">{{ $message }}</div>
                      @enderror
                    </div>
                  </div>
                  <div class="col-md-6 col-lg-3">
                    <div class="form-group">
                      <label for="num_ext">Número exterior</label>
                      <input id="num_ext" type="text" class="form-control"
                      name="num_ext" value="{{$domicilio->num_ext ?? '' }}">
                      @error('num_ext')
                        <div class="alert alert-danger">{{ $message }}</div>
                      @enderror
                    </div>
                  </div>
                  <div class="col-md-6 col-lg-3">
                    <div class="form-group">
                      <label for="num_int">Número interior</label>
                      <input id="num_int" type="text" class="form-control"
                      name="num_int" value="{{$domicilio->num_int ?? '' }}">
                      @error('num_int')
                        <div class="alert alert-danger">{{ $message }}</div>
                      @enderror
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <p class="text-muted">¿Entre qué calles está? (opcional)</p>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="calle1">Calle 1</label>
                      <input id="calle1" type="text" class="form-control"
                      name="calle1" value="{{$domicilio->calle1 ?? '' }}">
                      @error('calle1')
                        <div class="alert alert-danger">{{ $message }}</div>
                      @enderror
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="calle2">Calle 2</label>
                      <input id="calle2" type="text" class="form-control"
                      name="calle2" value="{{$domicilio->calle2 ?? '' }}">
                      @error('calle2')
                        <div class="alert alert-danger">{{ $message }}</div>
                      @enderror
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label for="comment">Indicaciones adicionales para entregar tus compras en esta dirección
                        <span class="required"></span>
                      </label>
                      <textarea id="referencia" rows="4" class="form-control" 
                      name="referencia">{{$domicilio->referencia ?? '' }}</textarea>
                      @error('referencia')
                        <div class="alert alert-danger">{{ $message }}</div>
                      @enderror
                    </div>
                  </div>
                </div>
                <div class="col-md-12 text-center">
                  <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i>
                    {{ isset($domicilio->id) ? 'Actualizar domicilio' : 'Guardar domicilio' }}
                  </button>
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