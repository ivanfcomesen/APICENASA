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

        $cantAnimales = $this->consulCantAnimales();
        $data = array(
            'code' => '119-008157',
            'nameSubata' => 'SUBASTA CAMARA DE GANADEROS PZ',
            'cantAnimales' => ($cantAnimales[0]['cantAnimales'])
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
        //strlen($this->formatGuia($request['guia'])
        $data = array(
            'guia' => $this->formatGuia($request['guia']),
            'boleta' => $this->maxId());
        return $data;
    }

    public function formatGuia($str) {
        //$request['cedula']     
        $respuesta = substr_replace($str, '-', 6, -7);
        return $respuesta;
    }

    public function formatTransportista(Request $request) {
        //$request['cedula']            
        $respuesta = substr_replace($request['codigoTransportista'], '-', 6, -11);

        $numAnimales = $this->consulCantAnimales();

        $transportista = $this->consultCedTranspDB($request);

        $data = array(
            'codigoProductor' => $respuesta,
            'numeroAnimal' => $numAnimales[0]['cantAnimales'],
            'codigoSubasta' => $transportista[0]['codigoTransportista']);
        //$resultado[0]['subastaActual'])

        return $data;
    }

    public function formatProductor(Request $request) {
        //$request['cedula']

        $productor = $this->consultCedProdDB($request);
        $respuesta = substr_replace($request['codigoProductor'], '-', 6, -15);

        $data = array(
            'codigoProductor' => $respuesta,
            'codigoSubasta' => $productor[0]['subasta']);

        return $data;
        // return $respuesta;
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
        $sql = "SELECT Nom_Cliente AS nombreProductor,Cod_Cliente as subasta, Cedula_Cliente AS cedulaProductor, Direccion AS direccion "
                . "FROM  Cliente WHERE (Cedula_Cliente = '" . "0601880814" . "')";
        $resultado = json_encode($conn->select($sql));

        return json_decode($resultado, true); //($resultado[0]['nombreProductor']);
    }

    public function consultCedTranspDB(Request $request) {
        //. $request['cedula']
        $conn = DB::connection("odbc");
        $sql = "SELECT Cod_Transport AS codigoTransportista, Nombre_Transport as nombreTransporte "
                . "FROM  Transportista WHERE (Ced_Juridica = '" . "0601880815" . "')";
        $resultado = json_encode($conn->select($sql));
        return json_decode($resultado, true); //($resultado[0]['nombreProductor']);
    }

    public function consulSubActual() {
        //. $request['cedula']
        $conn = DB::connection("odbc");
        $sql = "SELECT Subas_Actual AS subastaActual "
                . "FROM Compania WHERE (Ced_Juridica = '" . "3-002-071034" . "')";
        $resultado = json_encode($conn->select($sql));
        return json_decode($resultado, true); //($resultado[0]['subastaActual']);
    }

    public function consulCantAnimales() {
        //. $request['cedula']         
        $data = $this->consulSubActual();
        $conn = DB::connection("odbc");
        $sql = "SELECT Cant_Animales AS cantAnimales "
                . "FROM Reg_Subasta WHERE (Cod_Subasta = '" . $data[0]['subastaActual'] . "')";
        $resultado = json_encode($conn->select($sql));
        return json_decode($resultado, true); //($resultado[0]['subastaActual']);
    }

}
