<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Conse_Boleta;

class HeadguiaController extends Controller {

    public function ver() {
        
       // $consecutivo = Conse_Boleta::find(1);
       $data = Conse_Boleta ::All();
       echo $data;
        //echo $consecutivo->id;
       return view('posts.productor');
    }

}
