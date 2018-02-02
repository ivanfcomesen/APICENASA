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
            $tipoSenasa = $this->tiposSenasa($descripcionAnimal);

            $nuevaFila = "<tr><td style=width:95px; >" . $numeroAnimal . "</td>"
                    . "<td style=width:155px;>" . $descripcionAnimal . "</td>"
                    . "<td style=width:125px;>" . $tipoSenasa . "</td>"
                    . "<td style=width:100px;>" . $descripcionColor . "</td>"
                    . "<td style=width:80px;>" . $condicion . "</td></tr>";
        }
        return $nuevaFila;
    }

    public function tiposSenasa($descripcionAnimal) {

        $tipo = 'Indefinido';
        if ($descripcionAnimal === 'TORO') {
            $tipo = "Toro";
        } else
        if ($descripcionAnimal === 'TORETE') {
            $tipo = "Novillo";
        } else
        if ($descripcionAnimal === 'TERNERA') {
            $tipo = "Ternera";
        } else
        if ($descripcionAnimal === 'VACA') {
            $tipo = "Vaca";
        } else
        if ($descripcionAnimal === 'VAQUILLA') {
            $tipo = "Novilla";
        } else
        if ($descripcionAnimal === 'TERNERO') {
            $tipo = "Ternero";
        }
        return $tipo;
    }

    public function validaTipoSubasta($codigoAnimal) {

        $descripcionAnimal = "No exite";
        $tipos = $this->conexion->tipoAnimal();

        foreach ($tipos as $nodo) {
            if ($nodo['Cod_Animal'] === $codigoAnimal) {
                //si uno de los codigos coincide sacar la descripcion
                $descripcionAnimal = $nodo['Descripcion'];
            }
        }
        return $descripcionAnimal;
    }

    public function validaColorSubasta($codigoAnimal) {

        $descripcionColor = "";
        $colores = $this->conexion->ColorAnimal();

        foreach ($colores as $nodo) {
            if ($nodo['Cod_Color'] === $codigoAnimal) {
                $descripcionColor = $nodo['Descripcion'];
            }
        }
        return $descripcionColor;
    }

}
