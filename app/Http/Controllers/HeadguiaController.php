<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\EndPointsSENASA\Cliente;
use Illuminate\Http\Request;

class HeadguiaController extends Controller {

    protected $cliente;

    public function __construct(Cliente $cliente) {
        $this->cliente = $cliente;
    }

    public function index() {

//  $login = $this->cliente->login();
// if ($login['login_result'] == true) {         
//  $data = $this->cliente->codeEstablishment();
//    dd($data);
//     $code = $data['codigo']; //NO HAY DATA VALOR DE CODIGO NULL.
//  $name = $this->cliente->nameEstablishment($code);
//   $nameSubasta = $name['nombre'];
//  $nameSubasta = 'SUBASTA CAMARA DE GANADEROS PZ';
// $code = '119-008157'; //NO HAY DATA VALOR DE CODIGO NULL.
        $data = array(
            'code' => '119-008157',
            'nameSubata' => 'SUBASTA CAMARA DE GANADEROS PZ'
        );
//  } else {
//      return "Problemas con el login";
//  }
//  print_r($data);
//         

        return view('posts.productor')->with('data', $data);
    }

    public function guiaExiste(Request $request) {

//     $data = $this->cliente->guiaXCodigoDGuia($guia);
//      if ($data['resultado'] == 1) {
// $talonario = $request['guia'];
//Pintar en el Campo Boleta el codigo de talonario 
//   $talon = $this->maxId();
//    $this->insert();
//sacar el maximo id he imprimirlo en el campo boleta
// }
//   return $this->maxId();
        return $this->maxId();
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

        $conn = DB::connection("odbc");
        $sql = "UPDATE Conse_Boleta";
        $resultado = $conn->update($sql);
        var_dump($resultado);
        return view('posts.productor');
    }

    public function consultCedProdDB(Request $request) {

        //. $request['cedula']

        $conn = DB::connection("odbc");
        $sql = "SELECT Nom_Cliente AS nombreProductor, Cedula_Cliente AS cedulaProductor, Direccion AS direccion "
                . "FROM  Cliente WHERE (Cedula_Cliente = '" . "0601880814" . "')";
        $resultado = json_encode($conn->select($sql));
        var_dump($resultado[0]['nombreProductor']);

        return json_decode($resultado, true);
    }

}
