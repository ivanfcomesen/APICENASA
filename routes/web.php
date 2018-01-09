<?php

/*
  |--------------------------------------------------------------------------
  | Web Routes
  |--------------------------------------------------------------------------
  |
  | These
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

Route::get('getTipoAnimal', 'HeadguiaController@getTipoAnimal');

Route::get('formato', 'HeadguiaController@formatGuia');

Route::get('getSubastaActual', 'HeadguiaController@getSubastaActual');

Route::get('formatoProductor', 'HeadguiaController@formatProductor');

Route::get('formatoTransportista', 'HeadguiaController@formatTransportista');

Route::get('talonario', 'HeadguiaController@guiaExiste');

Route::get('getCedulaProductor', 'HeadguiaController@getCedulaProductor');

Route::get('getCantidadAnimales', 'HeadguiaController@getCantidadAnimales');

Route::get('getCedulaTrasportista', 'HeadguiaController@getCedulaTrasportista');

Auth::routes();
