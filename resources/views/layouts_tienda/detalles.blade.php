<div class="col-lg-9 order-1 order-lg-2">
    <div id="productMain" class="row">
        <div class="col-md-6">
            <div class="item">
                <img src="{{$cerveza->imagen}}" alt="" class="img-fluid">
            </div>
        </div>
        <div class="col-md-6">
            <div class="box">
                <div class="card">
                    <div class="card-header">
                        <h4>{{$cerveza->nombre}}</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <tbody>
                                    <tr>
                                        <th scope="row">Estilo</th>
                                        <td>{{$cerveza->estilo}}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Aspecto</th>
                                        <td>{{$cerveza->aspecto}}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Sabor y aroma</th>
                                        <td>{{$cerveza->sabor_aroma}}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Alcohol</th>
                                        <td>{{$cerveza->alcohol}}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Temperatura de consumo</th>
                                        <td>{{$cerveza->temp_consumo}}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Maridaje</th>
                                        <td>{{$cerveza->maridaje}}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Presentación</th>
                                        <td>{{$cerveza->presentacion}}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <p class="price">${{$cerveza->precio}}</p>
                @auth
                    <form action="{{route('cart.store')}}" method="POST">
                        @csrf
                        <input type="hidden" name="id" value="{{$cerveza->id}}">
                        <input type="hidden" name="name" value="{{$cerveza->nombre}}">
                        <input type="hidden" name="price" value="{{$cerveza->precio}}">
                        <p class="text-center buttons">
                            <button type="submit" class="btn btn-primary">
                                <i class="fa fa-shopping-cart"></i> Agregar al carro
                            </button>
                        </p>
                    </form>
                @endauth
                <hr>
                <div class="social">
                  <h4>Compártelo con tus amigos</h4>
                  <p>
                      <a href="#" class="external facebook">
                          <i class="fa fa-facebook"></i>
                        </a>
                        <a href="#" class="external gplus">
                            <i class="fa fa-google-plus"></i>
                        </a>
                        <a href="#" class="external twitter">
                            <i class="fa fa-twitter"></i>
                        </a>
                        <a href="#" class="email">
                            <i class="fa fa-envelope"></i>
                        </a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>