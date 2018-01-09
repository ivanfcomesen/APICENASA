<?php

namespace App;

use App\SubastaBdConfig;

class Transportista {

    protected $transportista;
    protected $conexion;

    public function __construct(SubastaBdConfig $conexion) {
        $this->conexion = $conexion;
    }

    public function formatTransportista($codigoTransportista, $cedula, $numAnimales) {
        $respuesta = substr_replace($codigoTransportista, '-', 6, -11);
        $transportista = $this->CedulaTransportista($cedula);

        $data = array(
            'codigoProductor' => $respuesta,
            'numeroAnimal' => $numAnimales,
            'codigoSubasta' => $transportista[0]['codigoTransportista']
        );
        return $data;
    }
    public function CedulaTransportista($cedula) {
        return $this->conexion->cCedTransporte($cedula);
    }

}
