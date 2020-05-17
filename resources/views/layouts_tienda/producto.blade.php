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
              <li aria-current="page" class="breadcrumb-item active">Cerveza</li>
            </ol>
          </nav>
        </div>
        @include('layouts_tienda.sidebars')
        @include('layouts_tienda.product-details')
      </div>
    </div>
  </div>
</div>
@endsection