<?php

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

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {

    return view('welcome');
});

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/productor', 'HeadguiaController@index');

Route::get('formato', 'HeadguiaController@formatGuia');

Route::get('formatoProductor', 'HeadguiaController@formatProductor');

Route::get('formatoTransportista', 'HeadguiaController@formatTransportista');

Route::get('talonario', 'HeadguiaController@guiaExiste');

Route::get('consultarCedulaProductor', 'HeadguiaController@consultCedProdDB');

Route::get('consultaCantidadAnimales', 'HeadguiaController@consulCantAnimales');

Route::get('consultarCedulaTransportista', 'HeadguiaController@consultCedTranspDB');

Auth::routes();

Route::get('/testeandop', function () {

    return view('posts.productor');
});




