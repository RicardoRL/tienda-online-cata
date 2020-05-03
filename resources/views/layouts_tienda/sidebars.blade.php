<div class="col-lg-3">
    <div class="card sidebar-menu mb-4">
        <div class="card-header">
            <h3 class="h4 card-title">Estilos</h3>
        </div>
        <div class="card-body force-scroll-estilos">
            <ul class="list-unstyled">
                <!-- foreach para los estilos-->
                @foreach($estilos as $estilo)
                    <li><a href="{{route('tienda.porEstilo', $estilo->estilo)}}" class="nav-link">{{$estilo->estilo}}</a></li>
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