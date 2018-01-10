<?php

namespace App;

use App\SubastaBdConfig;

class Productor {

    protected $conexion;

    public function __construct(SubastaBdConfig $conexion) {
        $this->conexion = $conexion;
    }

    public function formatProductor($cedula, $codigoProductor) {

        if ($this->validaFormatoProductor($codigoProductor)) {
            $productor = $this->CedulaProductor($cedula);
            $respuesta = substr_replace($codigoProductor, '-', 6, -15);

            $data = array(
                'codigoProductor' => $respuesta,
                'codigoSubasta' => $productor[0]['subasta']);

            return $data;
        } else {
            return 'Formato Invalido!';
        }
    }

    public function CedulaProductor($cedula) {
        return $this->conexion->cCedProductor($cedula);
    }

    public function validaFormatoProductor($codigoProductor) {
        $size = strlen($codigoProductor);
        if (($size < 22) or ( $size > 22)) {
            return false;
        }
        return true;
    }
}
