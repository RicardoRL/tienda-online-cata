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