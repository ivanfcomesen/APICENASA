<?php

namespace App;

Use App\Animal;
Use App\EndPointsSENASA\Cliente;
Use App\SubastaBdConfig;

class Guia {

    protected $conexion;

    //No se puede llamar el cliente dentro de

    public function __construct(SubastaBdConfig $conexion) {
        $this->conexion = $conexion;
    }

    public function guiaExiste($talonario, $codigoGuia, $usuarioId, $subasta) {
        
    }

    public function talonario() {
        return $talonario = $this->conexion->talonario();
    }

    public function formatGuia($guia) {

        $size = strlen($guia);

        if (($size < 14) or ( $size > 14)) {
            return false;
        } else {
            $respuesta = substr_replace($guia, '-', 6, -7);
            return $respuesta;
        }
    }

}
