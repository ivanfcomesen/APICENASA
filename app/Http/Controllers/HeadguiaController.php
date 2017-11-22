<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\EndPointsSENASA\Cliente;

class HeadguiaController extends Controller {

    protected $cliente;

    public function __construct(Cliente $cliente) {
        $this->cliente = $cliente;
    }

    public function index() {

         $login = $this->cliente->login();
         
         if($login['login_result'] == true){
             $code = $this->cliente->codeEstablishment();
             dd($code);
         }
         
     //   return $code;
    }

    public function maxId() {
        $conn = DB::connection("odbc");
        $sql = "Select max(id) as topId from Conse_Boleta";
        $resultado = $conn->selectOne($sql);
        $num = $resultado->topId + 1;
        return ("0000000" . $num);
    }

    public function insert() {

        $conn = DB::connection("odbc");
        $sql = "INSERT INTO Conse_Boleta (Consecutivo)" . "VALUES('" . $this->maxId() . "')";
        //echo $sql;
        $conn->insert($sql);
        //    return view('posts.productor');
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
