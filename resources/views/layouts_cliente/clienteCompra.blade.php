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
              <li aria-current="page" class="breadcrumb-item active">Carrito de compras</li>
            </ol>
          </nav>
        </div>
        <div id="basket" class="col-lg-9">
          <div class="box">
            <h1>Carrito de compras</h1>
            @if(session()->has('success_message'))
              <div class="alert alert-success" role="alert">
                {{session()->get('success_message')}}
              </div>
            @endif

            @if(count($errors) > 0)
              <div class="alert alert-danger" role="alert">
                <ul>
                  @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                  @endforeach
                </ul>
              </div>
            @endif

            @if(Cart::getContent()->count() > 0)
            <!--
            <form method="post" action="checkout1.html">-->
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
                        <td>
                          <select id="cantidad" class="form-control-sm" data-id="{{$item->id}}">
                            @for($i=1; $i<30+1; $i++)
                              <option {{ $item->quantity == $i ? 'selected' : ''}}>{{$i}}</option>
                            @endfor
                          </select>
                        </td>
                        <td>${{$item->model->precio}}</td>
                        <td>$0.00</td>
                        <td>${{$item->getPriceSum()}}</td>
                        <td>
                          <form action="{{route('cart.destroy', $item->id)}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-primary"><i class="fa fa-trash-o"></i></button>
                          </form>
                        </td>
                      </tr>
                    </tbody>
                  @endforeach
                  <tfoot>
                    <tr>
                      <th colspan="5">Total</th>
                      <th colspan="2">${{Cart::getSubTotal()}}</th><!--${{Cart::getSubTotal()}}-->
                    </tr>
                  </tfoot>
                </table>
              </div>
              <!-- /.table-responsive-->
              <div class="box-footer d-flex justify-content-between flex-column flex-lg-row">
                <div class="left">
                  <a href="{{route('tienda.index')}}" class="btn btn-outline-secondary">
                    <i class="fa fa-chevron-left"></i> Seguir comprando
                  </a>
                </div>
                <div class="right">
                  <button type="submit" class="btn btn-outline-secondary" formaction="#"><i class="fa fa-refresh"></i> Actualizar carrito</button>
                  <button type="submit" class="btn btn-primary">Continuar<i class="fa fa-chevron-right"></i></button>
                </div>
              </div>
            <!--</form>-->
            @else
              <p class="text-muted">No tienes productos en el carrito</p>
            @endif
          </div>
          <!-- /.box-->
          <div class="row same-height-row">
            <div class="col-lg-3 col-md-6">
              <div class="box same-height">
                <h3>You may also like these products</h3>
              </div>
            </div>
            <div class="col-md-3 col-sm-6">
              <div class="product same-height">
                <div class="flip-container">
                  <div class="flipper">
                    <div class="front"><a href="detail.html"><img src="img/product2.jpg" alt="" class="img-fluid"></a></div>
                    <div class="back"><a href="detail.html"><img src="img/product2_2.jpg" alt="" class="img-fluid"></a></div>
                  </div>
                </div>
                <a href="detail.html" class="invisible">
                  <img src="img/product2.jpg" alt="" class="img-fluid">
                </a>
                <div class="text">
                  <h3>Fur coat</h3>
                  <p class="price">$143</p>
                </div>
              </div>
              <!-- /.product-->
            </div>
            <div class="col-md-3 col-sm-6">
              <div class="product same-height">
                <div class="flip-container">
                  <div class="flipper">
                    <div class="front"><a href="detail.html"><img src="img/product1.jpg" alt="" class="img-fluid"></a></div>
                    <div class="back"><a href="detail.html"><img src="img/product1_2.jpg" alt="" class="img-fluid"></a></div>
                  </div>
                </div>
                <a href="detail.html" class="invisible">
                  <img src="img/product1.jpg" alt="" class="img-fluid">
                </a>
                <div class="text">
                  <h3>Fur coat</h3>
                  <p class="price">$143</p>
                </div>
              </div>
              <!-- /.product-->
            </div>
            <div class="col-md-3 col-sm-6">
              <div class="product same-height">
                <div class="flip-container">
                  <div class="flipper">
                    <div class="front"><a href="detail.html"><img src="img/product3.jpg" alt="" class="img-fluid"></a></div>
                    <div class="back"><a href="detail.html"><img src="img/product3_2.jpg" alt="" class="img-fluid"></a></div>
                  </div>
                </div>
                <a href="detail.html" class="invisible">
                  <img src="img/product3.jpg" alt="" class="img-fluid">
                </a>
                <div class="text">
                  <h3>Fur coat</h3>
                  <p class="price">$143</p>
                </div>
              </div>
              <!-- /.product-->
            </div>
          </div>
        </div>
        <!-- /.col-lg-9-->
        <div class="col-lg-3">
          <div id="order-summary" class="box">
            <div class="box-header">
              <h3 class="mb-0">Resumen de pedido</h3>
            </div>
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
        <!-- /.col-md-3-->
      </div>
    </div>
  </div>
</div>
@endsection

@push('script-update-cart')
<script src="/js/app.js"></script>
<script>
  (function(){
    document.addEventListener("DOMContentLoaded", function(){
      const classname = document.querySelectorAll('.form-control-sm');

      Array.from(classname).forEach(function(element){
        element.addEventListener('change', function(){
          const id = element.getAttribute('data-id');
          /*var req = axios.get('/cart').then(response => this.value = response.value);
          req.then(x =>console.log("Hecho"));*/
          axios.patch(`/cart/${id}`,{
            quantity: this.value
          })
          .then(function(response){
            //console.log(response);
            window.location.href = "{{route('cart.index')}}"
          })
          .catch(function (error){
            console.log(error);
            window.location.href = "{{route('cart.index')}}"
          });
        })
      })
    })
  })();
</script>
@endpush