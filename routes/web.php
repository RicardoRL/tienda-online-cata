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

//Ruta de inicio
Route::get('/inicio', function() {
    return view('layouts.content' );
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

/*Route::get('editor/login', 'EditorController@showLoginForm');
Route::post('editor/login', 'EditorController@login');*/
