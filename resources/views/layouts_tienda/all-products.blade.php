<div class="col-lg-9">
    <div class="box">
        <h1>Tienda</h1>
        <p>En nuestra tienda en línea podrás encontrar
            todos nuestros productos a un excelente precio.
        </p>
    </div>
    <div class="box info-bar">
        <div class="row">
            <div class="col-md-12 col-lg-7 products-showing">Mostrando <strong>{{$set["paginator"]->count()}}</strong> de <strong>{{$set["paginator"]->total()}}</strong> producto(s)
            </div>
        </div>
    </div>
    <div class="row products">
        <!--foreach para productos -->
        @foreach($productos as $producto)
            <div class="col-lg-4 col-md-6">
                <div class="product">
                    <div class="flip-container">
                        <div class="flipper">
                            <div class="front">
                                <a href="{{route('tienda.show', $producto['id'])}}">
                                    <img src="{{$producto['imagen']}}" alt="" class="img-fluid">
                                </a>
                            </div>
                            <div class="back">
                                <a href="{{route('tienda.show', $producto['id'])}}">
                                    <img src="{{$producto['imagen']}}" alt="" class="img-fluid">
                                </a>
                            </div>
                        </div>
                    </div>
                    <a href="#" class="invisible">
                        <img src="{{$producto['imagen']}}" alt="" class="img-fluid">
                    </a>
                    <div class="text">
                        <h3><a href="{{route('tienda.show', $producto['id'])}}">{{$producto['nombre']}}</a></h3>
                        <p class="price"> 
                            <del></del>${{$producto['precio']}}
                        </p>
                        <p class="buttons">
                            <a href="{{route('tienda.show', $producto['id'])}}" class="btn btn-outline-secondary">Ver detalles</a>
                            @auth
                                <form action="{{route('cart.store')}}" method="POST">
                                    @csrf
                                    <input type="hidden" name="id" value="{{$producto['id']}}">
                                    <input type="hidden" name="name" value="{{$producto['nombre']}}">
                                    <input type="hidden" name="price" value="{{$producto['precio']}}">
                                    <p class="text-center buttons">
                                        <button type="submit" class="btn btn-primary">
                                            <i class="fa fa-shopping-cart"></i> Agregar al carro
                                        </button>
                                    </p>
                                </form>
                            @endauth
                        </p>
                    </div>
                </div>
            </div>
        @endforeach
        <!-- endforeach -->
    </div>
    @include('layouts_tienda.paginacion')
</div>