<?php

namespace App;

use Illuminate\Support\Facades\DB;

class SubastaBdConfig {

    /**
     * The database connection used by the model.
     *
     */
    protected $conexion;

    public function __construct() {
        $this->conexion = DB::connection("odbc");
    }

    public function consulta($select) {
        $data = json_encode($this->conexion->select($select));
        return json_decode($data, true);
    }

    public function registra($select) {
        $this->conexion->insert($select);
        return true;
    }

    public function update($select) {
        $this->conexion->update($select);
        return true;
    }

    public function cSubActual() {
        return $this->consulta("SELECT Subas_Actual AS subastaActual "
                        . "FROM Compania WHERE (Ced_Juridica = '" . "3-002-071034" . "')");
    }

    public function cCantAnimales() {
        $SubActual = $this->cSubActual();
        return $this->consulta("SELECT Cant_Animales AS cantAnimales "
                        . "FROM Reg_Subasta WHERE (Cod_Subasta = '" . $SubActual[0]['subastaActual'] . "')");
    }

    public function cCedProductor($cedula) {

        return $this->consulta("SELECT Nom_Cliente AS nombreProductor,Cod_Cliente as subasta, Cedula_Cliente AS cedulaProductor, Direccion AS direccion "
                        . "FROM  Cliente WHERE (Cedula_Cliente = '" . "0601880814" . "')");
    }

    public function cCedTransporte($cedula) {
        return $this->consulta("SELECT Cod_Transport AS codigoTransportista, Nombre_Transport as nombreTransporte "
                        . "FROM  Transportista WHERE (Ced_Juridica = '" . "0601880815" . "')");
    }

    public function insert() {
        return $this->registra("INSERT INTO Conse_Boleta (Consecutivo)" . "VALUES('" . $this->maxId() . "')");
    }

    public function talonario() {
        $sql = "SELECT max(id) as topId from Conse_Boleta";
        $resultado = $this->conexion->selectOne($sql);
        $num = $resultado->topId + 1;
        return ("0000000" . $num);
    }

    public function tipoAnimal() {
        return $this->consulta("SELECT * FROM Tipo_Animal");
    }

    public function ColorAnimal() {
        return $this->consulta("SELECT * FROM Color_Animal");
    }
}
