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

    public function registroAnimal($codigoColor, $codigoAnimal, $condicion, $numeroAnimal) {

        $descripcionAnimal = $this->validaTipoSubasta($codigoAnimal);
        $descripcionColor = $this->validaColorSubasta($codigoColor);
        $nuevaFila = "";

        if ($descripcionAnimal == "") {
            $nuevaFila = "Codigo de Animal no existe";
        }
        if ($descripcionColor == "") {
            $nuevaFila = "Codigo de color no existe";
        }

        if (($descripcionAnimal != "") && ($descripcionColor != "")) {

            $nuevaFila = "<tr><td style=width:15%; >" + $numeroAnimal + "</td>"
                    + "<td style=width:25%;>" + $descripcionAnimal + "</td>"
                    + "<td style=width:20%;>" + 'tipoSena' + "</td>"
                    + "<td style=width:15%;>" + $descripcionColor + "</td>"
                    + "<td style=width:15%;>" + $condicion + "</td></tr>";
        }
        return $nuevaFila;
    }

    public function validaTipoSubasta($codigoAnimal) {


        $descripcionAnimal = "";
        $tipos = $this->conexion->tipoAnimal();

        foreach ($tipos as $nodo) {
            if ($nodo['Codigo_Animal'] === $codigoAnimal) {
                //si uno de los codigos coincide sacar la descripcion
                // $banderaTipos = true;
                $descripcionAnimal = $nodo['Descripcion_Animal'];
            }
        }
        return $descripcionAnimal;
    }

    public function validaColorSubasta($codigoAnimal) {

        $descripcionColor = "";
        $colores = $this->conexion->ColorAnimal();

        foreach ($colores as $nodo) {
            if ($nodo['Color_Animal'] === $codigoAnimal) {
                $descripcionColor = $nodo['Descripcion_Color'];
            }
        }
        return $descripcionColor;
    }

}
