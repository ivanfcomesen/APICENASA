<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\EndPointsSENASA\Cliente;
use App\Productor;
use App\Transportista;
use App\Animal;
use App\Guia;
use Illuminate\Http\Request;

class HeadguiaController extends Controller {

    protected $cliente;
    protected $productor;
    protected $transportista;
    protected $animal;
    protected $guia;

    public function __construct(Cliente $cliente, Productor $productor, Transportista $transportista, Animal $animal, Guia $guia) {
        $this->cliente = $cliente;
        $this->productor = $productor;
        $this->transportista = $transportista;
        $this->animal = $animal;
        $this->guia = $guia;
    }

    public function index() {

//  $login = $this->cliente->   ();
//  if ($login['login_result'] == true) {         
//  $data = $this->cliente->codeEstablishment();
//  dd($data);
//  $code = $data['codigo']; //NO HAY DATA VALOR DE CODIGO NULL.
//  $name = $this->cliente->nameEstablishment($code);
//  $nameSubasta = $name['nombre'];
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
        return $this->guia->guiaExiste($request['guia']);
    }

    public function formatoTransportista(Request $request) {
        $numAnimales = $this->getCantidadAnimales();
        return $this->transportista->formatoTransportista($request['codigoTransportista'], $request['cedula'], $numAnimales[0]['cantAnimales']);
    }

    public function formatoProductor(Request $request) {

        return $this->productor->formatProductor('cedula', $request['codigoProductor']);
    }

    public function getUltimoAnimal() {
        return $this->animal->ultimoAnimal();
    }

    public function getCantidadAnimales() {
        return $this->animal->CantidadAnimales();
    }

    public function getTipoAnimal() {
        return $this->animal->tipoAnimal();
    }

    public function getColorAnimal() {
        return $this->animal->ColorAnimal();
    }

}
