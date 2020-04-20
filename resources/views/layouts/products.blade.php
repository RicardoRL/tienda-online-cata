<!--
*** HOT PRODUCT SLIDESHOW ***
_________________________________________________________
-->
<div id="hot">
  <div class="box py-4">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h2 class="mb-0">lo mejor</h2>
        </div>
      </div>
    </div>
  </div>
  <div class="container">
    <div class="product-slider owl-carousel owl-theme">
      @foreach($cervezas as $cerveza)
      <div class="item">
        <div class="product">
          <div class="flip-container">
            <div class="flipper">
              <div class="front"><a href="{{route('tienda.show', $cerveza->id)}}"><img src="{{$cerveza->imagen}}" alt="" class="img-fluid"></a></div>
              <div class="back"><a href="{{route('tienda.show', $cerveza->id)}}"><img src="{{$cerveza->imagen}}" alt="" class="img-fluid"></a></div>
            </div>
          </div>
          <a href="{{route('tienda.show', $cerveza->id)}}" class="invisible"><img src="{{$cerveza->imagen}}" alt="" class="img-fluid"></a>
          <div class="text">
            <h3><a href="{{route('tienda.show', $cerveza->id)}}">{{$cerveza->nombre}}</a></h3>
            <p class="price"> 
              <del></del>${{$cerveza->precio}}
            </p>
          </div>
          <!-- /.text-->
          <!--
          <div class="ribbon sale">
            <div class="theribbon">SALE</div>
            <div class="ribbon-background"></div>
          </div>
          -->
          <!-- /.ribbon-->
          <!--
          <div class="ribbon new">
            <div class="theribbon">NEW</div>
            <div class="ribbon-background"></div>
          </div>
          -->
          <!-- /.ribbon-->
          <!--
          <div class="ribbon gift">
            <div class="theribbon">GIFT</div>
            <div class="ribbon-background"></div>
          </div>
          -->
          <!-- /.ribbon-->
        </div>
        <!-- /.product-->
      </div>
      @endforeach
      <!-- /.product-slider-->
    </div>
    <div class="row justify-content-center">
      <p class="loadMore">
        <a href="{{route('tienda.index')}}" class="btn btn-primary btn-lg">
          Mostrar todo
        </a>
      </p>
    </div>
    <!-- /.container-->
  </div>
  <!-- /#hot-->
  <!-- *** HOT END ***-->
</div>