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
              <li aria-current="page" class="breadcrumb-item active">Mis pedidos</li>
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
                <a href="#" class="nav-link active"><i class="fa fa-list"></i> Mis pedidos</a>
                <a href="{{route('logout')}}" class="nav-link"
                onclick="event.preventDefault();
                document.getElementById('logout-form').submit();"><i class="fa fa-sign-out"></i> Salir</a>
              </ul>
            </div>
          </div>
          <!-- /.col-lg-3-->
          <!-- *** CUSTOMER MENU END ***-->
        </div>
        <div id="customer-orders" class="col-lg-9">
          <div class="box">
            @if(session()->has('success_message'))
              <div class="alert alert-success" role="alert">
                {{session()->get('success_message')}}
              </div>
            @endif
            <h1>Mis pedidos</h1>
            <p class="lead">Tus pedidos en un sólo lugar.</p>
            <p class="text-muted">Si tienes alguna pregunta o problema, no dudes en <a href="contact.html">contactarnos</a>, nuestro personal estará respondiendo lo más pronto posible.</p>
            <hr>
            <div class="table-responsive">
              <table class="table table-hover">
                <thead>
                  <tr>
                    <th>Pedido</th>
                    <th>Fecha</th>
                    <th>Total</th>
                    <th>Estado</th>
                    <th>Acción</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($pedidos as $pedido)
                  <tr>
                    <th>{{$pedido->id}}</th>
                    <td>{{$pedido->fecha}}</td>
                    <td>${{$pedido->total}}</td>
                    @if($pedido->estado == 'pedido hecho')
                      <td><span class="badge badge-info">{{$pedido->estado}}</span></td>
                    @elseif($pedido->estado == 'recibido')
                      <td><span class="badge badge-success">{{$pedido->estado}}</span></td>
                    @elseif($pedido->estado == 'cancelado')
                      <td><span class="badge badge-danger">{{$pedido->estado}}</span></td>
                    @elseif($pedido->estado == 'enviado')
                      <td><span class="badge badge-warning">{{$pedido->estado}}</span></td>
                    @endif
                    <td><a href="{{route('pedido.showOneOrder', [\Auth::user()->id, $pedido->id])}}" class="btn btn-primary btn-sm">Ver</a></td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection