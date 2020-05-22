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
              <li class="breadcrumb-item"><a href="{{route('pedido.showOrders')}}">Mis Pedidos</a></li>
              <li aria-current="page" class="breadcrumb-item active">Pedido {{$pedido->id}}</li>
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
                <a href="{{route('cliente.show', [Auth::user()->id])}}" class="nav-link"><i class="fa fa-user"></i> Mi cuenta</a>
                <a href="{{route('pedido.showOrders')}}" class="nav-link active"><i class="fa fa-list"></i> Mis pedidos</a>
                <a href="{{route('logout')}}" class="nav-link"
                onclick="event.preventDefault();
                document.getElementById('logout-form').submit();"><i class="fa fa-sign-out"></i> Salir</a>
              </ul>
            </div>
          </div>
          <!-- /.col-lg-3-->
          <!-- *** CUSTOMER MENU END ***-->
        </div>
        <div id="customer-order" class="col-lg-9">
          <div class="box">
            <h1>Pedido {{$pedido->id}}</h1>
            <p class="lead">Este pedido se realizó el <strong>{{$pedido->fecha}}</strong> y su estado es <strong>{{$pedido->estado}}</strong>.</p>
            <p class="text-muted">Si tiens algún problema o pregunta, no dudes en <a href="contact.html">contactarnos</a>, nuestro personal estará respondiendo lo más pronto posible.</p>
            <hr>
            <div class="table-responsive mb-4">
              <table class="table">
                <thead>
                  <tr>
                    <th colspan="2">Producto</th>
                    <th>Cantidad</th>
                    <th>Precio unitario</th>
                    <th>Descuento</th>
                    <th>Total</th>
                  </tr>
                </thead>
                <tbody>
                  @for($i=0; $i<$size; $i++)
                    <tr>
                      <td><a href="#"><img src="{{$cervezas['modelo'][$i]->imagen}}" alt="{{$cervezas['modelo'][$i]->nombre}}"></a></td>
                      <td><a href="#">{{$cervezas['modelo'][$i]->nombre}}</a></td>
                      <td>{{$cervezas['cantidad'][$i]}}</td>
                      <td>${{$cervezas['modelo'][$i]->precio}}</td>
                      <td>$0.00</td>
                      <td>${{($cervezas['modelo'][$i]->precio)*($cervezas['cantidad'][$i])}}.00</td>
                    </tr>
                  @endfor
                </tbody>
                <tfoot>
                  <tr>
                    <th colspan="5" class="text-right">Subtotal</th>
                    <th>${{$pedido->subtotal}}</th>
                  </tr>
                  <tr>
                    <th colspan="5" class="text-right">Envío</th>
                    @if($pedido->metodo_envio == 'normal')
                      <th>$116.00</th>
                    @elseif($pedido->metodo_envio == 'expres')
                      <th>$174.00</th>
                    @endif
                  </tr>
                  <tr>
                    <th colspan="5" class="text-right">Total</th>
                    <th>${{$pedido->total}}</th>
                  </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.table-responsive-->
            <div class="row addresses">
              <div class="col-lg-6">
                <h2>Ubicación de la tienda</h2>
                <p>John Brown<br>13/25 New Avenue<br>New Heaven<br>45Y 73J<br>England<br>Great Britain</p>
              </div>
              <div class="col-lg-6">
                <h2>Dirección de entrega</h2>
                <p>
                  {{\Auth::user()->nombre}} {{\Auth::user()->apepat}}<br>
                  {{$domicilio->calle_principal}} {{$domicilio->num_ext}}<br>
                  interior: {{$domicilio->num_int}}<br>
                  Col. {{$domicilio->colonia}}<br>
                  {{$domicilio->ciudad}}<br>
                  {{$domicilio->estado}}
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection