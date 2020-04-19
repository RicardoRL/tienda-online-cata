<div class="col-lg-9">
    <div class="box">
        <h1>Tienda</h1>
        <p>En nuestra tienda en línea podrás encontrar
            todos nuestros productos a un excelente precio.
        </p>
    </div>
    <div class="box info-bar">
        <div class="row">
            <div class="col-md-12 col-lg-4 products-showing">Mostrando <strong>12</strong> de <strong>25</strong> productos
            </div>
            <div class="col-md-12 col-lg-7 products-number-sort">
                <form class="form-inline d-block d-lg-flex justify-content-between flex-column flex-md-row">
                    <div class="products-number"><strong>Ver</strong><a href="#" class="btn btn-sm btn-primary">12</a><a href="#" class="btn btn-outline-secondary btn-sm">24</a><a href="#" class="btn btn-outline-secondary btn-sm">Todos</a></div>
                    <div class="products-sort-by mt-2 mt-lg-0"><strong>Ordenar por</strong>
                        <select name="sort-by" class="form-control">
                            <option>Precio</option>
                            <option>Nombre</option>
                            <option>Vendidos</option>
                        </select>
                    </div>
                </form>
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
                                <a href="#">
                                    <img src="{{$producto->imagen}}" alt="" class="img-fluid">
                                </a>
                            </div>
                            <div class="back">
                                <a href="#">
                                    <img src="{{$producto->imagen}}" alt="" class="img-fluid">
                                </a>
                            </div>
                        </div>
                    </div>
                    <a href="#" class="invisible">
                        <img src="{{$producto->imagen}}" alt="" class="img-fluid">
                    </a>
                    <div class="text">
                        <h3><a href="detail.html">{{$producto->nombre}}</a></h3>
                        <p class="price"> 
                            <del></del>${{$producto->precio}}
                        </p>
                        <p class="buttons">
                            <a href="{{route('tienda.show', $producto->id)}}" class="btn btn-outline-secondary">Ver detalles</a>
                            <a href="basket.html" class="btn btn-primary">
                                <i class="fa fa-shopping-cart"></i>Agregar al carro
                            </a>
                        </p>
                    </div>
                </div>
            </div>
        @endforeach
        <!-- endforeach -->
    </div>
    <div class="pages">
        <nav aria-label="Page navigation example" class="d-flex justify-content-center">
            <ul class="pagination">
                @if(count($paginas) >= $limite)
                    <li class="page-item">
                        <a href="{{route('tienda.paginacion', $paginas)}}" aria-label="Previous" class="page-link">
                            <span aria-hidden="true">«</span>
                            <span class="sr-only">Atrás</span>
                        </a>
                    </li>
                @endif
                @if(count($paginas) < $limite)
                    @for($i = 1; $i < $limite; $i++)
                        <li class="page-item active"><a href="{{route('tienda.show')}}" class="page-link">{{$i}}</a></li>
                    @endfor
                @else
                    @for($i = $inicio; $i <= $limite; $i++)
                        <li class="page-item"><a href="#" class="page-link">{{$i}}</a></li>
                    @endfor
                @endif
                @if(count($paginas) >= $limite)
                    <li class="page-item">
                        <a href="{{route('tienda.paginacion', count($paginas)-$limite)}}" aria-label="Next" class="page-link">
                            <span aria-hidden="true">»</span>
                            <span class="sr-only">Siguiente</span>
                        </a>
                    </li>
                @endif
            </ul>
        </nav>
    </div>
</div>