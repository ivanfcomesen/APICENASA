<?php

namespace App;

use Illuminate\Support\Facades\DB;

class SubastaBdConfig {

    /**
     * The database connection used by the model.
     *
     */
    public $conexion;
    public $tabla;

    public function __construct() {
                
        $this->conexion = DB::connection("odbc");
    }

    public function consulta($select) {        
        $data = json_encode($this->conexion->select($select));
        return json_decode($data, true);
    }
        
    public function update($nombreTabla,$condicion) {
                
        $sql = "Update". " ".$nombreTabla.$condicion;// .$nombreTabla.$condicion;        
        $data = json_encode($conn->update($sql));

    }
}
