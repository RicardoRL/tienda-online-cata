<div id="search" class="collapse">
  <div class="container">
    <form role="search" class="ml-auto" action="{{route('tienda.buscar')}}" method="POST">
      @csrf
      <div class="input-group">
        <input type="text" placeholder="Buscar" class="form-control" name="buscar">
        <div class="input-group-append">
          <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>
        </div>
      </div>
    </form>
  </div>
</div>