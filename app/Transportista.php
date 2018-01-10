<?php

namespace App;

use App\SubastaBdConfig;

class Transportista {

    protected $transportista;
    protected $conexion;

    public function __construct(SubastaBdConfig $conexion) {
        $this->conexion = $conexion;
    }

    public function formatoTransportista($codigoTransportista, $cedula, $numAnimales) {

        if ($this->validaFormatoTransportista($codigoTransportista)) {
            $respuesta = substr_replace($codigoTransportista, '-', 6, -11);
            $transportista = $this->CedulaTransportista($cedula);

            $data = array(
                'codigoProductor' => $respuesta,
                'numeroAnimal' => $numAnimales,
                'codigoSubasta' => $transportista[0]['codigoTransportista']
            );
            return $data;
        } else {
            return 'Formato Invalido!';
        }
    }

    public function CedulaTransportista($cedula) {
        return $this->conexion->cCedTransporte($cedula);
    }

    public function validaFormatoTransportista($codigoTransportista) {
        $size = strlen($codigoTransportista);
        if (($size < 18) or ( $size > 18)) {
            return false;
        }
        return true;
    }

}
