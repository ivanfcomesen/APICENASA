<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\EndPointsSENASA\Cliente;
use App\SubastaBdConfig;
use App\Productor;
use App\Transportista;
use Illuminate\Http\Request;

class HeadguiaController extends Controller {

    protected $cliente;
    protected $conexion;
    protected $productor;
    protected $transportista;

    public function __construct(Cliente $cliente, SubastaBdConfig $conexion, Productor $productor, Transportista $transportista) {
        $this->cliente = $cliente;
        $this->conexion = $conexion;
        $this->productor = $productor;
        $this->transportista = $transportista;
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
            'cantAnimales' => ($cantAnimales[0]['cantAnimales']),
            'tablaColores' => $this->getColorAnimal(),
            'tablaTipos' => $this->getTipoAnimal()
        );
        //return $data;
        return view('posts.mainContainer')->with('data', $data);
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

    public function formatoTransportista(Request $request) {
        $numAnimales = $this->getCantidadAnimales();
        return $this->transportista->formatoTransportista($request['codigoTransportista'], $request['cedula'], $numAnimales[0]['cantAnimales']);
    }

    public function formatoProductor(Request $request) {

        return $this->productor->formatProductor('cedula', $request['codigoProductor']);
    }

    public function ultimoAnimal() {
        return $this->conexion->ultAnimal();
    }

    public function getSubastaActual() {
        return $this->conexion->cSubActual();
    }

    public function getCantidadAnimales() {
        return $this->conexion->cCantAnimales();
    }

    public function getTipoAnimal() {
        return $this->conexion->tipoAnimal();
    }

    public function getColorAnimal() {
        return $this->conexion->ColorAnimal();
    }

}
