@extends('layouts.header')

@section('content')
<div id="all">
  <div id="content">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{route('cliente.index')}}">Inicio</a></li>
              <li aria-current="page" class="breadcrumb-item active">Checkout - Dirección</li>
            </ol>
          </nav>
        </div>
        <div id="checkout" class="col-lg-9">
          <div class="box">
            @if(\Request::is('cliente/checkout/domicilio'))
              @include('partials.checkouts.checkoutDomicilio')
            @elseif(\Request::is('cliente/checkout/envio'))
              @include('partials.checkouts.checkoutEnvio')
            @endif
          </div>
        </div>
        <div class="col-md-3">
          <div id="order-summary" class="card">
            <div class="card-header">
              <h4 class="mt-4 mb-4">Resumen de pedido</h4>
            </div>
            <div class="card-body">
              <p class="text-muted">Shipping and additional costs are calculated based on the values you have entered.</p>
              <div class="table-responsive">
                <table class="table">
                  <tbody>
                    <tr>
                      <td>Subtotal</td>
                      <th>${{Cart::getSubTotal()}}</th><!--${{Cart::getSubTotal()}}-->
                    </tr>
                    <tr>
                      <td>Envío</td>
                      <th>{{Cart::getCondition('envio')->getAttributes()['format']}}</th>
                      <!--{{Cart::getCondition('envio')->getAttributes()['format']}}-->
                    </tr>
                    <tr>
                      <td>I.V.A (16%)</td>
                      <th>MIENTRAS</th>
                    </tr>
                    <tr class="total">
                      <td>Total</td>
                      <th>${{Cart::getTotal()}}</th><!--${{Cart::getTotal()}}-->
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection