<?php

namespace App;

use App\SubastaBdConfig;

class Productor {

    protected $productor;
    protected $conexion;

    public function __construct(SubastaBdConfig $conexion) {
        $this->conexion = $conexion;
    }

    public function formatProductor($cedula,$codigoProducto) {
        $productor = $this->CedulaProductor($cedula);
        $respuesta = substr_replace($codigoProducto, '-', 6, -15);

        $data = array(
            'codigoProductor' => $respuesta,
            'codigoSubasta' => $productor[0]['subasta']);
        return $data;
    }

    public function CedulaProductor($cedula) {
        return $this->conexion->cCedProductor($cedula);
    }

}
