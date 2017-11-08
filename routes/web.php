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
use GuzzleHttp\Client;

Route::get('/', function () {
    
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::get('/testeandop', function () {
    
    
    $client = new Client([
        // Base URI is used with relative requests
        'base_uri' => 'http://test-tgrupal.addax.cc',
        
        // You can set any number of default request options.
        'timeout'  => 5.0,
    ]);
    
    $response = $client->request('GET', '/popupnocss.php?module=Users&func=loginfromcurlmd5&email=rgonzales@hotmail.com&password=rgonzales&app=subasta');
    
     $posts = $response->getBody()->getContents();
    
    return view('posts.index');
});


