<div class="nav flex-column flex-md-row nav-pills text-center">
  <a href="#" class="nav-link flex-sm-fill text-sm-center" disabled>
      <i class="fa fa-map-marker"></i>Dirección
  </a>
  <a href="#" class="nav-link flex-sm-fill text-sm-center" disabled>
      <i class="fa fa-truck"></i>Envío
  </a>
  <a href="#" class="nav-link flex-sm-fill text-sm-center" disabled>
      <i class="fa fa-money"></i>Pago
  </a>
  <a href="#" class="nav-link flex-sm-fill text-sm-center active">
      <i class="fa fa-eye"></i>Pedido
  </a>
</div>
<div class="content py-3">
  <div class="box">
    @if(Cart::getContent()->count() > 0)
      <p class="text-muted">Tienes {{Cart::getTotalQuantity()}} producto(s) en el carrito</p>
      <div class="table-responsive">
        <table class="table">
          <thead>
            <tr>
              <th colspan="2">Producto</th>
              <th>Cantidad</th>
              <th>Precio unitario</th>
              <th>Descuento</th>
              <th colspan="2">Total</th>
            </tr>
          </thead>
          @foreach(Cart::getContent() as $item)
            <tbody>
              <tr>
                <td>
                  <a href="{{route('tienda.show', $item->id)}}">
                    <img src="{{$item->model->imagen}}" alt="$item->model->nombre" class="fit-image">
                  </a>
                </td>
                <td><a href="{{route('tienda.show', $item->id)}}">{{$item->model->nombre}}</a></td>
                <td>{{$item->quantity}}</td>
                <td>${{$item->model->precio}}</td>
                <td>$0.00</td>
                <td>${{$item->getPriceSum()}}</td>
              </tr>
            </tbody>
          @endforeach
          <tfoot>
            <tr>
              <th colspan="5">Total</th>
              <th colspan="2">${{Cart::getSubTotal()}}</th>
            </tr>
          </tfoot>
        </table>
      </div>
    @else
      <p class="text-muted">No tienes productos en el carrito</p>
    @endif
  </div>
</div>
<div class="box-footer d-flex justify-content-between">
  <a href="{{url('cliente/checkout/pago')}}" class="btn btn-outline-secondary">
    <i class="fa fa-chevron-left"></i>Regresa a Pago
  </a>
  <a href="{{route('pedido.store')}}" class="btn btn-primary">
  Finalizar pedido
    <i class="fa fa-chevron-right"></i>
  </a>
</div>