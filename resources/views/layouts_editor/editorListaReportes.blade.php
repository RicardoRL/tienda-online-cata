@extends('layouts_editor.editorMenu')

@section('content')
<div id="all">
  <div id="content">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-12">
          <div class="breadcrumb-holder">
            <div class="container-fluid">
              <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('editor.index')}}">Inicio</a></li>
                <li class="breadcrumb-item active">Lista de reportes       </li>
              </ul>
            </div>
          </div>
        </div>
        <section>
          <div class="col-lg-6">
            <div class="box">
              @if(session()->has('error_message'))
                <div class="alert alert-danger" role="alert">
                  {{session()->get('error_message')}}
                </div>
              @endif
              <h1>Nueva cuenta</h1>
              <p class="lead">¿Aún no te has registrado?</p>
              <p>Regístrate para obtener las mejores promociones y descuentos en nuestros productos.</p>
              <p class="text-muted">Si tienes preguntas o problemas, no dudes en<a href="contact.html"> contactarnos</a>, nuestro personal se pondrá en contacto contigo.</p>
              <hr>
            </div>
          </div>
        </section>
      </div>
    </div>
  </div>
</div>
@endsection