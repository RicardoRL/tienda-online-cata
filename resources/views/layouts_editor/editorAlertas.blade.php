<!-- Editor -->
@if(Session::has('logeado')) 
    <div class="alert alert-success col-lg-5 mx-auto" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          <center>  <h2 class="alert-heading"> Bienvenido a la interfaz Editor de la tienda CATA</h2> <hr>
         <p>Has iniciado sesión correctamente.</p> </center>
</div>
@endif

@if(Session::has('editorCreado')) 
    <div class="alert alert-dismissible col-lg-5 mx-auto {{Session::get('clase-alerta', 'alert-info')}} " role="alert">   
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          <center>   <strong> {{Session::get('editorCreado')}} </strong> </center>
    </div>
@endif

@if(Session::has('editorUpdate')) 
    <div class="alert alert-dismissible col-lg-5 mx-auto {{Session::get('clase-alerta', 'alert-info')}} " role="alert">   
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          <center>   <strong> {{Session::get('editorUpdate')}} </strong> </center>
    </div>
@endif

@if(Session::has('editorDelete')) 
    <div class="alert alert-dismissible col-lg-5 mx-auto {{Session::get('clase-alerta', 'alert-info')}} " role="alert">   
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          <center>   <strong> {{Session::get('editorDelete')}} </strong> </center>
    </div>
@endif
<!-- Evento --->

@if(Session::has('alerta')) 
    <div class="alert alert-dismissible col-lg-5 mx-auto {{Session::get('clase-alerta', 'alert-info')}} " role="alert">   
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          <center>   <strong> {{Session::get('alerta')}} </strong> </center>
    </div>
@endif

@if(Session::has('eventoActualizacion')) 
    <div class="alert alert-dismissible col-lg-5 mx-auto {{Session::get('clase-alerta', 'alert-info')}} " role="alert">   
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          <center>   <strong> {{Session::get('eventoActualizacion')}} </strong> </center>
    </div>
@endif

@if(Session::has('eventoDelete')) 
    <div class="alert alert-dismissible col-lg-5 mx-auto {{Session::get('clase-alerta', 'alert-info')}} " role="alert">   
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          <center>   <strong> {{Session::get('eventoDelete')}} </strong> </center>
    </div>
@endif

<!-- Cerveceria --->


@if(Session::has('cerveceriaCreate')) 
    <div class="alert alert-dismissible col-lg-5 mx-auto {{Session::get('clase-alerta', 'alert-info')}} " role="alert">   
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          <center>   <strong> {{Session::get('cerveceriaCreate')}} </strong> </center>
    </div>
@endif

@if(Session::has('cerveceriaUpdate')) 
    <div class="alert alert-dismissible col-lg-5 mx-auto {{Session::get('clase-alerta', 'alert-info')}} " role="alert">   
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          <center>   <strong> {{Session::get('cerveceriaUpdate')}} </strong> </center>
    </div>
@endif

@if(Session::has('cerveceriaDelete')) 
    <div class="alert alert-dismissible col-lg-5 mx-auto {{Session::get('clase-alerta', 'alert-info')}} " role="alert">   
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          <center>   <strong> {{Session::get('cerveceriaDelete')}} </strong> </center>
    </div>
@endif

<!-- Cerveza --->


@if(Session::has('cervezaCreate')) 
    <div class="alert alert-dismissible col-lg-5 mx-auto {{Session::get('clase-alerta', 'alert-info')}} " role="alert">   
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          <center>   <strong> {{Session::get('cervezaCreate')}} </strong> </center>
    </div>
@endif

@if(Session::has('cervezaUpdate')) 
    <div class="alert alert-dismissible col-lg-5 mx-auto {{Session::get('clase-alerta', 'alert-info')}} " role="alert">   
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          <center>   <strong> {{Session::get('cervezaUpdate')}} </strong> </center>
    </div>
@endif

@if(Session::has('cervezaDelete')) 
    <div class="alert alert-dismissible col-lg-5 mx-auto {{Session::get('clase-alerta', 'alert-info')}} " role="alert">   
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          <center>   <strong> {{Session::get('cervezaDelete')}} </strong> </center>
    </div>
@endif

@if(Session::has('error_message')) 
    <div class="alert alert-dismissible col-lg-5 mx-auto alert-danger " role="alert">   
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          <center>   <strong> {{Session::get('error_message')}} </strong> </center>
    </div>
@endif