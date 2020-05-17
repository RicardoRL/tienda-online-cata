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
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li aria-current="page" class="breadcrumb-item active">Contact</li>
            </ol>
          </nav>
        </div>
        <div class="col-lg-3">
          <!--
          *** PAGES MENU ***
          _________________________________________________________
          -->
          <div class="card sidebar-menu mb-4">
            <div class="card-header">
              <h3 class="h4 card-title">Pages</h3>
            </div>
            <div class="card-body">
              <ul class="nav nav-pills flex-column">
                <li><a href="text.html" class="nav-link">Text page</a></li>
                <li><a href="contact.html" class="nav-link">Contact page</a></li>
                <li><a href="faq.html" class="nav-link">FAQ</a></li>
              </ul>
            </div>
          </div>
          <!-- *** PAGES MENU END ***-->
          <div class="banner"><a href="#"><img src="img/banner.jpg" alt="sales 2014" class="img-fluid"></a></div>
        </div>
        <div class="col-lg-9">
          <div id="contact" class="box">
            <h1>Contacto</h1>
            <p class="lead">¿Tienes curiosidad por algo? ¿Tienes algún tipo de problema con nuestros productos?</p>
            <p>No dude en contactarnos, nuestro centro de servicio al cliente está trabajando para usted 24/7.</p>
            <hr>
            <div class="row">
              <div class="col-md-4">
                <h3><i class="fa fa-map-marker"></i>Direccion</h3>
                <p>13/25 New Avenue<br>New Heaven<br>45Y 73J<br>England<br><strong>Great Britain</strong></p>
                <br><br>
                <hr>  
            </div>
            <div class="col-md-4">
              <h3><i class="fa fa-phone"></i>Centro de llamadas </h3>
              <p class="text-muted">Este número es gratuito si llama desde Gran Bretaña; de lo contrario, le recomendamos que utilice la forma de comunicación electrónica.</p>
              <p><strong>+33 555 444 333</strong></p>
              <br>
              <hr>
            </div>
            <div class="col-md-4">
              <h3><i class="fa fa-envelope"></i> Soporte electronico</h3>
              <p class="text-muted">No dude en escribirnos un correo electrónico o utilizar nuestro sistema de tickets electrónicos.</p>
              <ul>
                <li><strong><a href="mailto:">cata@cerveza.mx</a></strong></li>
                <li><strong><a href="#">Ticketio</a></strong> - nuestra plataforma de soporte de tickets</li>
                <br><hr>
              </ul>
            </div>
            <hr>
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3726.907963584636!2d-100.76740665025271!3d20.916022196926615!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x842b504889101903%3A0x361ef772634e3163!2sCervecer%C3%ADa%20Allende!5e0!3m2!1ses-419!2smx!4v1587338968527!5m2!1ses-419!2smx" width="1000" height="600" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
            <hr>
            <h2>Contact form</h2>
            <form>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="firstname">Nombre</label>
                    <input id="nombre" type="text" class="form-control" name="nombre" required >
                    @error('nombre')
                      <div class="alert alert-danger">{{ $message }}</div>
                    @enderror  
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="lastname">Apellido</label>
                    <input id="apellido" type="text" class="form-control" name="apellido" required>
                    @error('apellido')
                      <div class="alert alert-danger">{{ $message }}</div>
                    @enderror    
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="email">Correo electronico</label>
                    <input id="email" type="text" class="form-control" name="correo" required >
                    @error('correo')
                      <div class="alert alert-danger">{{ $message }}</div>
                    @enderror  
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="subject">Asunto</label>
                    <input id="subject" type="text" class="form-control" name="asunto" required>
                    @error('asunto')
                      <div class="alert alert-danger">{{ $message }}</div>
                    @enderror   
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="message">Mensaje</label>
                    <textarea id="message" class="form-control" name="mensaje" required></textarea>
                    @error('mensaje')
                      <div class="alert alert-danger">{{ $message }}</div>
                    @enderror 
                  </div>             
                </div>
                <div class="col-md-12 text-center">
                  <button type="submit" class="btn btn-primary"><i class="fa fa-envelope-o"></i> Enviar</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection