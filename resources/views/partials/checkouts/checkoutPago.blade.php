<div class="nav flex-column flex-md-row nav-pills text-center">
  <a href="#" class="nav-link flex-sm-fill text-sm-center" disabled>
      <i class="fa fa-map-marker"></i>Dirección
  </a>
  <a href="#" class="nav-link flex-sm-fill text-sm-center" disabled>
      <i class="fa fa-truck"></i>Envío
  </a>
  <a href="#" class="nav-link flex-sm-fill text-sm-center active">
      <i class="fa fa-money"></i>Pago
  </a>
  <a href="#" class="nav-link flex-sm-fill text-sm-center" disabled>
      <i class="fa fa-eye"></i>Pedido
  </a>
</div>
<div class="content py-3">
  <form action="{{route('cliente.checkout_rev')}}" method="GET">
    @if(Session::has('error_message'))
      <div class="alert alert-warning" role="alert">{{Session::get('error_message')}}</div>
    @endif
    <div class="row">
      <div class="col-md-6">
        <div class="box shipping-method">
          <h4>Tarjeta de crédito/débito</h4>
          <p>Realizar tu pago con tarjeta.</p>
          <div class="box-footer text-center">
            <input type="radio" name="pago" value="tarjeta">
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="box shipping-method">
          <h4>PayPal</h4>
          <p>Realizar tu pago a través de PayPal.</p>
          <div class="box-footer text-center">
            <input type="radio" name="pago" value="paypal">
            <input type="hidden" name="envio" value="{{\Request::get('envio')}}">
          </div>
        </div>
      </div>
    </div>
    <div class="box-footer d-flex justify-content-between">
      <a href="{{route('cliente.checkout_env')}}" class="btn btn-outline-secondary">
        <i class="fa fa-chevron-left"></i>Regresa a Envío
      </a>
      <button type="submit" class="btn btn-primary">
        Revisa tu pedido
        <i class="fa fa-chevron-right"></i>
      </button>
    </div>
  </form>
</div>