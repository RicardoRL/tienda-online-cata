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
                  <li class="breadcrumb-item"><a href="#">Inicio</a></li>
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
                    <a href="customer-orders.html" class="nav-link active"><i class="fa fa-list"></i> Mis pedidos</a>
                    <a href="customer-wishlist.html" class="nav-link"><i class="fa fa-heart"></i> Mi lista de deseos</a>
                    <a href="customer-account.html" class="nav-link"><i class="fa fa-user"></i> Mi cuenta</a>
                    <a href="index.html" class="nav-link"><i class="fa fa-sign-out"></i> Salir</a>
                  </ul>
                </div>
              </div>
              <!-- /.col-lg-3-->
              <!-- *** CUSTOMER MENU END ***-->
            </div>
            <div class="col-lg-9">
              <div class="box">
                <h1>Mi Cuenta</h1>
                <p class="lead">Agrega la información de tu domicilio, tarjeta o cambia tu contraseña</p>
                <h3>Cambia tu contraseña</h3>
                <form>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="password_old">Contraseña actual</label>
                        <input id="password_old" type="password" class="form-control" name="old-password">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="password_1">Contraseña nueva</label>
                        <input id="password_1" type="password" class="form-control" name="password">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="password_2">Escribe de nuevo tu contraseña</label>
                        <input id="password_2" type="password" class="form-control" name="password-repeated">
                      </div>
                    </div>
                  </div>
                  <!-- /.row-->
                  <div class="col-md-12 text-center">
                    <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Guardar nueva contraseña</button>
                  </div>
                </form>
                <h3 class="mt-5">Información Personal</h3>
                <form>
                  <div class="row">
                    <div class="col-md-4">
                      <div class="form-group">
                        <label for="nombre">Nombre</label>
                        <input id="nombre" type="text" class="form-control" name="nombre" value="{{Auth::user()->nombre}}">
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                        <label for="apepat">Apellido Paterno</label>
                        <input id="apepat" type="text" class="form-control" name="apepat" value="{{Auth::user()->apepat}}">
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                        <label for="apemat">Apellido Materno</label>
                        <input id="apemat" type="text" class="form-control" name="apemat" value="{{Auth::user()->apemat}}">
                      </div>
                    </div>
                  </div>
                  <!-- /.row-->
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="fecnac">Fecha de nacimiento</label>
                        <input id="fecnac" type="date" class="form-control" name="fecnac" value="{{Auth::user()->fecnac}}">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="telefono">Teléfono</label>
                        <input id="telefono" type="text" class="form-control" name="telefono" value="{{Auth::user()->telefono}}">
                      </div>
                    </div>
                  </div>
                  <!-- /.row-->
                  <div class="col-md-12 text-center">
                    <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Guardar cambios</button>
                  </div>
                </form>
                <h3 class="mt-5">Domicilio</h3>
                <form action="{{route('domicilio.store')}}" method="POST">
                  @csrf
                  <div class="row">
                    <div class="col-md-6 col-lg-3">
                      <div class="form-group">
                        <label for="codpos">Código postal</label>
                        <input id="codpos" type="text" class="form-control"  name="codigo_postal">
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
                        <input id="estado" type="text" class="form-control" name="estado">
                        @error('estado')
                          <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="ciudad">Ciudad</label>
                        <input id="ciudad" type="text" class="form-control" name="ciudad">
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
                        <input id="colonia" type="text" class="form-control" name="colonia">
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
                        <input id="calle_principal" type="text" class="form-control" name="calle_principal">
                        @error('calle_principal')
                          <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                      </div>
                    </div>
                    <div class="col-md-6 col-lg-3">
                      <div class="form-group">
                        <label for="num_ext">Número exterior</label>
                        <input id="num_ext" type="text" class="form-control" name="num_ext">
                        @error('num_ext')
                          <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                      </div>
                    </div>
                    <div class="col-md-6 col-lg-3">
                      <div class="form-group">
                        <label for="num_int">Número interior</label>
                        <input id="num_int" type="text" class="form-control" name="num_int">
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
                        <input id="calle1" type="text" class="form-control" name="calle1">
                        @error('calle1')
                          <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="calle2">Calle 2</label>
                        <input id="calle2" type="text" class="form-control" name="calle2">
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
                        <textarea id="referencia" rows="4" class="form-control" name="referencia"></textarea>
                        @error('referencia')
                          <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                      </div>
                    </div>
                  </div>
                  <div class="col-md-12 text-center">
                    <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Guardar domicilio</button>
                  </div>
                </form>
                <h3 class="mt-5">Tarjeta</h3>
                <form>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="num_tarjeta">Número de tarjeta</label>
                        <input id="num_tarjeta" type="text" class="form-control" name="num_tarjeta">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="banco">Banco</label>
                        <input id="banco" type="text" class="form-control" name="banco">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="nombre">Nombre</label>
                        <input id="nombre" type="text" class="form-control" name="nombre">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="apellido">Apellido</label>
                        <input id="apellido" type="text" class="form-control" name="apellido">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6 col-lg-3">
                      <div class="form-group">
                        <label for="fecha_exp">Fecha de expiración</label>
                        <input id="fecha_exp" type="text" class="form-control" name="fecha_exp">
                      </div>
                    </div>
                    <div class="col-md-6 col-lg-3">
                      <div class="form-group">
                        <label for="codigo">Código de seguridad</label>
                        <input id="codigo" type="text" class="form-control" name="codigo">
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