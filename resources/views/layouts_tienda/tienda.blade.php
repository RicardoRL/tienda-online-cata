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
                            @guest
                                <li class="breadcrumb-item"><a href="{{route('inicio')}}">Inicio</a></li>
                            @else
                                <li class="breadcrumb-item"><a href="{{route('cliente.index')}}">Inicio</a></li>
                            @endguest
                            <li aria-current="page" class="breadcrumb-item active">Tienda</li>
                        </ol>
                    </nav>
                </div>
                <div class="col-lg-3">
                    <div class="card sidebar-menu mb-4">
                        <div class="card-header">
                            <h3 class="h4 card-title">Estilos</h3>
                        </div>
                        <div class="card-body force-scroll-estilos">
                            <ul class="list-unstyled">
                                <!-- foreach para los estilos-->
                                @foreach($estilos as $estilo)
                                    <li><a href="#" class="nav-link">{{$estilo->estilo}}</a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <div class="card sidebar-menu mb-4">
                        <div class="card-header">
                            <h3 class="h4 card-title">Cervecerías
                                <a href="#" class="btn btn-sm btn-danger pull-right">
                                    <i class="fa fa-times-circle"></i>Limpiar
                                </a>
                            </h3>
                        </div>
                        <div class="card-body">
                            <form>
                                <div class="form-group">
                                    <!-- foreach -->
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox"> <!--Marca de cerveza-->
                                        </label>
                                    </div>
                                </div>
                                <button class="btn btn-default btn-sm btn-primary">
                                    <i class="fa fa-pencil"></i>Aplicar
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
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
                                                <a href="detail.html">
                                                    <img src="img/product1.jpg" alt="" class="img-fluid">
                                                </a>
                                            </div>
                                            <div class="back">
                                                <a href="detail.html">
                                                    <img src="img/product1_2.jpg" alt="" class="img-fluid">
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <a href="detail.html" class="invisible">
                                        <img src="img/product1.jpg" alt="" class="img-fluid">
                                    </a>
                                    <div class="text">
                                        <h3><a href="detail.html">{{$producto->nombre}}</a></h3>
                                        <p class="price"> 
                                            <del></del>${{$producto->precio}}
                                        </p>
                                        <p class="buttons">
                                            <a href="detail.html" class="btn btn-outline-secondary">Ver detalles</a>
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
                                <li class="page-item">
                                    <a href="#" aria-label="Previous" class="page-link">
                                        <span aria-hidden="true">«</span>
                                        <span class="sr-only">Atrás</span>
                                    </a>
                                </li>
                                <li class="page-item active"><a href="#" class="page-link">1</a></li>
                                <li class="page-item"><a href="#" class="page-link">2</a></li>
                                <li class="page-item">
                                    <a href="#" aria-label="Next" class="page-link">
                                        <span aria-hidden="true">»</span>
                                        <span class="sr-only">Siguiente</span>
                                    </a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <footer>
            @include('layouts.footer')
        </footer>
@endsection