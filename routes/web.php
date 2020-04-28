<?php

use Illuminate\Support\Facades\Route;
use App\Cerveza;

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

    //$cervecerias = mostrarCerveceriasMenu();
    //dd($cervecerias);

    return view('layouts.content', compact('cervezas'));
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
Route::get('tienda/paginacion/{paginas}', 'ShopController@paginacion')->name('tienda.paginacion');
Route::resource('tienda', 'ShopController');

//Ruta para contacto
Route::get('/contacto', function() {

    return view('layouts_cliente.contacto');
});

//Ruta para el carrito de compras
Route::resource('cart', 'CartController');
Route::get('cart/update', 'CartController@updating')->name('cart.updating');
Route::get('vaciar', function(){
    Cart::clear();
});
