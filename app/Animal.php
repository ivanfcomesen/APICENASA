<?php

namespace App;

Use App\SubastaBdConfig;


class Animal {

    protected $conexion;
    
       public function __construct(SubastaBdConfig $conexion) {
        return $this->conexion = $conexion;
    }

    public function CantidadAnimales() {
        return $this->conexion->cCantAnimales();
    }

    public function TipoAnimal() {
        return $this->conexion->tipoAnimal();
    }

    public function ColorAnimal() {
        return $this->conexion->ColorAnimal();
    }

}
