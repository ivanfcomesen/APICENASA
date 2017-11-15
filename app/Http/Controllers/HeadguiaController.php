<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Conse_Boleta;
use Illuminate\Support\Facades\DB;

class HeadguiaController extends Controller {


    public function index() {
        //Perfecto
        $conn = DB::connection("odbc");
        $sql = "Select * from Conse_Boleta";
        $resultado = $conn->select($sql);                    
        var_dump($resultado);
      //  return view('posts.productor');
    }

    public function maxId() {
        //Perfecto
        $conn = DB::connection("odbc");
        $sql = "Select max(id) from Conse_Boleta";        
        $arrayResp = $conn->select($sql);

        
        
        //$resultado = $conn->select($sql);
        
        var_dump($sql);
        var_dump($arrayResp);

        return view('posts.productor');
    }

    public function insert() {
        //Perfecto
        $conn = DB::connection("odbc");
        $sql = "INSER INTO Conse_Boleta (Consecutivo) Values (?)";
        $conn->insert($sql, array(''));
        $resultado = $conn->insert($sql);
        var_dump($resultado);

        return view('posts.productor');
    }

    public function update() {
        //Perfecto
        $conn = DB::connection("odbc");
        $sql = "UPDATE Conse_Boleta";
        $resultado = $conn->update($sql);
        var_dump($resultado);

        return view('posts.productor');
    }

}
