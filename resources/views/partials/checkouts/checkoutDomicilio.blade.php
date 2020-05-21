<div class="nav flex-column flex-md-row nav-pills text-center">
  <a href="#" class="nav-link flex-sm-fill text-sm-center active">
      <i class="fa fa-map-marker"></i>Dirección
  </a>
  <a href="#" class="nav-link flex-sm-fill text-sm-center" disabled>
      <i class="fa fa-truck"></i>Envío
  </a>
  <a href="#" class="nav-link flex-sm-fill text-sm-center" disabled>
      <i class="fa fa-money"></i>Pago
  </a>
  <a href="#" class="nav-link flex-sm-fill text-sm-center" disabled>
      <i class="fa fa-eye"></i>Pedido
  </a>
</div>
<div class="content py-3">
  @if($domicilio->id != NULL)
    <div class="row">
      <div class="col-md-6 col-lg-3">
        <div class="form-group">
          <label for="codpos">Código postal</label>
          <input id="codpos" type="text" class="form-control" disabled
          name="codigo_postal" value="{{$domicilio->codigo_postal ?? '' }}">
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-6">
        <div class="form-group">
          <label for="estado">Estado</label>
          <input id="estado" type="text" class="form-control" disabled
          name="estado" value="{{$domicilio->estado ?? '' }}">
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          <label for="ciudad">Ciudad</label>
          <input id="ciudad" type="text" class="form-control" disabled
          name="ciudad" value="{{$domicilio->ciudad ?? '' }}">
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-6">
        <div class="form-group">
          <label for="colonia">Colonia</label>
            <input id="colonia" type="text" class="form-control" disabled
            name="colonia" value="{{$domicilio->colonia ?? '' }}">
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-6">
        <div class="form-group">
          <label for="calle_principal">Calle principal</label>
          <input id="calle_principal" type="text" class="form-control" disabled
          name="calle_principal" value="{{$domicilio->calle_principal ?? '' }}">
        </div>
      </div>
      <div class="col-md-6 col-lg-3">
        <div class="form-group">
          <label for="num_ext">Número exterior</label>
          <input id="num_ext" type="text" class="form-control" disabled
          name="num_ext" value="{{$domicilio->num_ext ?? '' }}">
        </div>
      </div>
      <div class="col-md-6 col-lg-3">
        <div class="form-group">
          <label for="num_int">Número interior</label>
          <input id="num_int" type="text" class="form-control" disabled
          name="num_int" value="{{$domicilio->num_int ?? '' }}">
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-6">
        <div class="form-group">
          <label for="calle1">Calle 1</label>
          <input id="calle1" type="text" class="form-control" disabled
          name="calle1" value="{{$domicilio->calle1 ?? '' }}">
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          <label for="calle2">Calle 2</label>
          <input id="calle2" type="text" class="form-control" disabled
          name="calle2" value="{{$domicilio->calle2 ?? '' }}">
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="form-group">
          <label for="comment">Indicaciones adicionales para entregar tus compras en esta dirección
            <span class="required"></span>
          </label>
          <textarea id="referencia" rows="4" class="form-control" disabled
          name="referencia">{{$domicilio->referencia ?? '' }}</textarea>
        </div>
      </div>
    </div>
  @else
    <p class="text-muted">Favor de registrar tu domicilio antes de terminar de procesar el pedido.</p>
    <div class="text-center">
      <a href="{{route('domicilio.index')}}" class="btn btn-primary" disabled>
        <i class="fa fa-save"></i>
        Registra tu domicilio
      </a>
    </div>
  @endif
</div>
<div class="box-footer d-flex justify-content-between">
  <a href="{{route('cart.index')}}" class="btn btn-outline-secondary">
    <i class="fa fa-chevron-left"></i>Regresa al carrito
  </a>
  @if($domicilio->id != NULL)
    <a href="{{route('cliente.checkout_env')}}" class="btn btn-primary" disabled>
      Selecciona forma de envío
      <i class="fa fa-chevron-right"></i>
    </a>
  @endif
</div>