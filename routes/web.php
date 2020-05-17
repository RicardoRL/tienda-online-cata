<?php

use Illuminate\Support\Facades\Route;
use App\Cerveceria;
use App\Cerveza;
use App\Evento;
use App\Editor;

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

    return view('layouts.content', compact('cervezas'));
})->name('inicio');

//Rutas para el cliente
Route::get('passwd/{cliente}', 'ClienteController@passwd')->name('cliente.passwd');
Route::get('cliente/compra', 'ClienteController@compra')->name('cliente.compra');
Route::get('cliente/checkout/domicilio', 'ClienteController@checkout_dom')->name('cliente.checkout_dom');
Route::get('cliente/checkout/envio', 'ClienteController@checkout_env')->name('cliente.checkout_env');
Route::get('cliente/checkout/pago', 'ClienteController@checkout_pag')->name('cliente.checkout_pag');
Route::get('cliente/checkout/revision', 'ClienteController@checkout_rev')->name('cliente.checkout_rev');
Route::resource('cliente', 'ClienteController');

//Ruta para domicilio
Route::resource('domicilio', 'DomicilioController');

//Ruta para tarjeta
Route::resource('tarjeta', 'TarjetaController');

//Rutas para editor
Route::get('/editor/update', function() {
    $editor = Editor::all();
    return view('layouts_editor.editorUPdate',compact('editor'));
});

Route::get('/editor/delete', function() {
    $editor = Editor::all();
    return view('layouts_editor.editorDelete',compact('editor'));
});

Route::get('editor/login', 'Auth\EditorLoginController@showLoginForm');
Route::post('editor/login', 'Auth\EditorLoginController@login')->name('editor.login');
Route::resource('editor', 'EditorController');

//Rutas para cerveceria
Route::get('/cerveceria/delete', function() {
    $cerveceria = Cerveceria::all();
    return view('layouts_cerveceria.cerveceriaDelete',compact('cerveceria'));
}); 

Route::resource('cerveceria', 'CerveceriaController');

//Rutas para cerveza
Route::resource('cerveza', 'CervezaController');

//Rutas para la tienda
Route::get('tienda/cervezas', 'ShopController@porCerveceria')->name('tienda.porCerveceria');
Route::get('estilo/{estilo}', 'ShopController@porEstilo')->name('tienda.porEstilo');
Route::resource('tienda', 'ShopController');

//Ruta para contacto
Route::get('/contacto', function() {

    return view('layouts_cliente.contacto');
});

//Ruta para el carrito de compras
Route::resource('cart', 'CartController');
Route::post('cart/coupon', 'CartController@apply')->name('cart.apply');
Route::get('vaciar', function(){
    Cart::clear();
});

//Ruta para Eventos
Route::get('/evento/delete/{id}', function($id) {
    $evento = Evento::findOrFail($id);
    return view ('layouts_evento.eventoShow', compact('evento'));
});

Route::get('/evento/delete', function() {
    $evento = Evento::all();
    return view('layouts_evento.eventoDelete',compact('evento'));
});

Route::resource('evento', 'EventoController');