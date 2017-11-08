<?php

use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->
    user();
});

Route::get('/testean', function () {
        
        
        $client = new Client([
            // Base URI is used with relative requests
            'base_uri' => 'http://test-tgrupal.addax.cc',
            
            // You can set any number of default request options.
            'timeout'  => 5.0,
        ]);
        
        $response = $client->request('GET', '/popupnocss.php?module=Users&func=loginfromcurlmd5&email=rgonzales@hotmail.com&password=rgonzales&app=subasta');
        
        dd($response->getBody()->getContents());
        
        return view('welcome');
    });
