<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\EndPointsSENASA\Cliente;
use App\SubastaBdConfig;
use Illuminate\Http\Request;

class HeadguiaController extends Controller {

    protected $cliente;
    protected $conexion;

    public function __construct(Cliente $cliente, SubastaBdConfig $conexion) {
        $this->cliente = $cliente;
        $this->conexion = $conexion;
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

        $cantAnimales = $this->getCantidadAnimales();
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
            'boleta' => $this->ultimoAnimal());
        return $data;
    }

    public function formatGuia($str) {
//$request['cedula']     
        $respuesta = substr_replace($str, '-', 6, -7);
        return $respuesta;
    }

    public function formatTransportista(Request $request) {

        $respuesta = substr_replace($request['codigoTransportista'], '-', 6, -11);

        $numAnimales = $this->getCantidadAnimales();

        $transportista = $this->getCedulaTrasportista($request);

        $data = array(
            'codigoProductor' => $respuesta,
            'numeroAnimal' => $numAnimales[0]['cantAnimales'],
            'codigoSubasta' => $transportista[0]['codigoTransportista']);

        return $data;
    }

    public function formatProductor(Request $request) {

        $productor = $this->getCedulaProductor($request);
        $respuesta = substr_replace($request['codigoProductor'], '-', 6, -15);

        $data = array(
            'codigoProductor' => $respuesta,
            'codigoSubasta' => $productor[0]['subasta']);
        return $data;
    }

    public function ultimoAnimal() {
        return $this->conexion->ultAnimal();
    }

    public function update() {
        //evaluar result de update
        return $this->conexion->update("UPDATE Conse_Boleta");
    }

    public function getCedulaProductor(Request $request) {
        return $this->conexion->cCedProductor($request['cedula']);
    }

    public function getCedulaTrasportista(Request $request) {
        return $this->conexion->cCedTransporte($request['cedula']);
    }

    public function getSubastaActual() {
        return $this->conexion->cSubActual();
    }

    public function getCantidadAnimales() {
        return $this->conexion->cCantAnimales();
    }

    //. $request['cedula']
    //($resultado[0]['nombreProductor']);
    //$resultado[0]['subastaActual'])
}
