@extends('layouts.header')

@section('content')
<div id="all">
  <div id="content">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div id="main-slider" class="owl-carousel owl-theme">
            <div class="item"><img src="img/img-index1.gif" alt="" class="img-fluid"></div>
            <div class="item"><img src="img/img-index2.gif" alt="" class="img-fluid"></div>
            <div class="item"><img src="img/img-index3.gif" alt="" class="img-fluid"></div>
          </div>
          <!-- /#main-slider-->
        </div>
      </div>
    </div>
    <!--
    *** ADVANTAGES HOMEPAGE ***
    _________________________________________________________
    -->
    <div id="advantages">
      <div class="container">
        <div class="row mb-4">
          <div class="col-md-4">
            <div class="box clickable d-flex flex-column justify-content-center mb-0 h-100">
              <div class="icon"><i class="fa fa-heart"></i></div>
              <h3><a href="#">We love our customers</a></h3>
              <p class="mb-0">We are known to provide best possible service ever</p>
            </div>
          </div>
          <div class="col-md-4">
            <div class="box clickable d-flex flex-column justify-content-center mb-0 h-100">
              <div class="icon"><i class="fa fa-tags"></i></div>
              <h3><a href="#">Best prices</a></h3>
              <p class="mb-0">You can check that the height of the boxes adjust when longer text like this one is used in one of them.</p>
            </div>
          </div>
          <div class="col-md-4">
            <div class="box clickable d-flex flex-column justify-content-center mb-0 h-100">
              <div class="icon"><i class="fa fa-thumbs-up"></i></div>
              <h3><a href="#">100% satisfaction guaranteed</a></h3>
              <p class="mb-0">Free returns on everything for 3 months.</p>
            </div>
          </div>
        </div>
        <!-- /.row-->
      </div>
      <!-- /.container-->
    </div>
    <!-- /#advantages-->
    <!-- *** ADVANTAGES END ***-->
    <!--
    *** HOT PRODUCT SLIDESHOW ***
    _________________________________________________________
    -->
    @include('layouts.blog')
    <footer>
      @include('layouts.footer')
    </footer>
@endsection