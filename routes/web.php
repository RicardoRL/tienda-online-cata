<?php

use Illuminate\Support\Facades\Route;

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

/*Route::get('/', function () {
    return view('welcome');
});*/

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/inicio', function() {
    return view('layouts.content' );
})->name('inicio');

Route::get('passwd/{cliente}', 'ClienteController@passwd')->name('cliente.passwd');
Route::get('cliente/compra', 'ClienteController@compra')->name('cliente.compra');
Route::resource('cliente', 'ClienteController');

Route::resource('domicilio', 'DomicilioController');

Route::resource('tarjeta', 'TarjetaController');
