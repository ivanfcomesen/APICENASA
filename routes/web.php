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

Route::get('talonario', 'HeadguiaController@guiaExiste');

Route::get('consultarCedulaProductor', 'HeadguiaController@consultCedProdDB');

Auth::routes();

Route::get('/testeandop', function () {

    return view('posts.productor');
});


