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

Route::get('/getbairsdev', 'HeadguiaController@getbairsdev');


Route::get('/productor', 'HeadguiaController@index');

Route::get('guiaExiste', 'HeadguiaController@guiaExiste');

Route::get('registroAnimal', 'HeadguiaController@registroAnimal');

Route::get('formato', 'HeadguiaController@formatGuia');

Route::get('getSubastaActual', 'HeadguiaController@getSubastaActual');

Route::get('formatoProductor', 'HeadguiaController@formatoProductor');

Route::get('formatoTransportista', 'HeadguiaController@formatoTransportista');

Route::get('talonario', 'HeadguiaController@guiaExiste');

Route::get('getCantidadAnimales', 'HeadguiaController@getCantidadAnimales');



Auth::routes();
