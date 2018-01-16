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
        //Login en el ws del API si exito trae el codigo del establecimiento
        //Jala colores y tipos de BD subasta
        
    //    $login = $this->cliente->login();
    //    $cantAnimales = $this->getCantidadAnimales();
   //     if ($login['login_result'] == true) {
        //    $codigoEstablecimiento = $this->cliente->codeEstablishment();
         //   $code = $this->cliente->nameEstablishment($codigoEstablecimiento['codigo']);
         /*   $data = array(
                'talonario' => $this->getTalonario(),
                'code' => $codigoEstablecimiento['codigo'],
                'nameSubata' => $code['nombre'],
                'cantAnimales' => ($cantAnimales[0]['cantAnimales']),
                'tablaColores' => $this->getColorAnimal(),
                'tablaTipos' => $this->getTipoAnimal()
            );*/
            
            $data = array(
                'talonario' => $this->getTalonario(),
                'code' => 'Modo test',
                'nameSubata' => 'Modo test',
                'cantAnimales' => 'Modo test',
                'tablaColores' => $this->getColorAnimal(),
                'tablaTipos' => $this->getTipoAnimal()
            );
            
            return view('posts.mainContainer')->with('data', $data);
      //  }
    }

    //capturo la info enla capa media y se la seteo a las clases;
    public function guiaExiste(Request $request) {
        $talonario = $this->getTalonario();
        $codigoGuia = $this->guia->formatGuia($request['guia']);
        if ($codigoGuia != false) {
            $establecimiento = $this->cliente->codeEstablishment();
            $data = $this->cliente->verificaExiste($talonario, $codigoGuia, $establecimiento['userid'], $establecimiento['codigo']);
            if ($data['resultado'] == 0) {
                $data = array(
                    'guia' => $codigoGuia
                );
                return $data;
            }
        } else {
            return 'Formato Invalido!';
        }
    }

    public function formatoTransportista(Request $request) {
        $numAnimales = $this->getCantidadAnimales();
        return $this->transportista->formatoTransportista($request['codigoTransportista'], $request['cedula'], $numAnimales[0]['cantAnimales']);
    }

    public function formatoProductor(Request $request) {

        return $this->productor->formatProductor('cedula', $request['codigoProductor']);
    }

    public function getTalonario() {
        return $this->guia->talonario();
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
