@extends('layouts.header')

@section('content')
<div id="all">
  <div id="content">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div id="main-slider" class="owl-carousel owl-theme">
            <div class="item"><img src="img/img-index1.gif" alt="" class="img-fluid"></div>
            <div class="item"><img src="img/img-index3.gif" alt="" class="img-fluid"></div>
            <div class="item"><img src="img/img-index4.gif" alt="" class="img-fluid"></div>
          </div>
        </div>
      </div>
    </div>
    <!--*** ADVANTAGES HOMEPAGE ***-->
    <div id="advantages">
      <div class="container">
        <div class="row mb-4">
          <div class="col-md-4">
            <div class="box d-flex flex-column justify-content-center mb-0 h-100">
              <div class="icon"><i class="fa fa-heart"></i></div>
              <h3><a href="#">Elige lo que quieras</a></h3>
              <p class="mb-0">Selecciona tus cervezas artesanales y agrégalas al carrito de compras.</p>
            </div>
          </div>
          <div class="col-md-4">
            <div class="box d-flex flex-column justify-content-center mb-0 h-100">
              <div class="icon"><i class="fa fa-tags"></i></div>
              <h3><a href="#">Los mejores precios</a></h3>
              <p class="mb-0">Contamos con una amplia variedad de cervezas artesanales mexicanas e importadas a un excelente precio.</p>
            </div>
          </div>
          <div class="col-md-4">
            <div class="box d-flex flex-column justify-content-center mb-0 h-100">
              <div class="icon"><i class="fa fa-thumbs-up"></i></div>
              <h3><a href="#">No esperes mucho</a></h3>
              <p class="mb-0">En máximo 7 días hábiles recibirás el pedido en la puerta de tu casa</p>
            </div>
          </div>
        </div>
      </div>
    </div><!-- *** ADVANTAGES END ***-->
    @include('layouts.products-section')
    <!-- el include blog -->
@endsection