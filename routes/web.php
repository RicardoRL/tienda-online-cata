<?php

use Illuminate\Support\Facades\Route;
use App\Cerveza;
use App\Evento;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();

//Ruta de inicio
Route::get('/', function(){
    return redirect()->route('inicio');
});

Route::get('/inicio', function() {

    $cervezas = Cerveza::inRandomOrder()->take(10)->get();
    $cervezas = $cervezas->all();

    return view('layouts.content')->with('cervezas', $cervezas);
})->name('inicio');

//Rutas para el cliente
Route::get('passwd/{cliente}', 'ClienteController@passwd')->name('cliente.passwd');
Route::get('cliente/compra', 'ClienteController@compra')->name('cliente.compra');
Route::resource('cliente', 'ClienteController');

//Ruta para domicilio
Route::resource('domicilio', 'DomicilioController');

//Ruta para tarjeta
Route::resource('tarjeta', 'TarjetaController');

//Rutas para editor
Route::get('editor/login', 'Auth\EditorLoginController@showLoginForm');
Route::post('editor/login', 'Auth\EditorLoginController@login')->name('editor.login');
Route::resource('editor', 'EditorController');

//Rutas para cerveceria
Route::get('cerveceria/cervezas', 'CerveceriaController@cervezas')->name('cerveceria.cervezas');
Route::resource('cerveceria', 'CerveceriaController');

//Rutas para cerveza
Route::get('cervezas/{estilo}', 'CervezaController@estilos')->name('cerveza.estilo');
Route::resource('cerveza', 'CervezaController');

//Rutas para la tienda
Route::resource('tienda', 'ShopController');

//Ruta para contacto
Route::get('/contacto', function() {

    return view('layouts_cliente.contacto');
});

//Ruta para el carrito de compras
Route::resource('cart', 'CartController');
Route::get('cart/update', 'CartController@updating')->name('tienda.paginacion');
Route::get('vaciar', function(){
    Cart::clear();
});

//Ruta para Eventos
Route::get('/evento/Delete/{id}', function($id) {
    $evento = Evento::findOrFail($id);
    return view ('layouts_evento.eventoShow', compact('evento'));
});

Route::get('/evento/Delete', function() {
    $evento = Evento::all();
    return view('layouts_evento.eventoDelete',compact('evento'));
});

Route::resource('evento', 'EventoController');



