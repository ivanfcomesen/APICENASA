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

    public function guiaExiste($talonario,$codigoGuia,$usuarioId, $subasta) {

        
        
        return $data;
//      if ($data['resultado'] == 1) {
// $talonario = $request['guia'];
//Pintar en el Campo Boleta el codigo de talonario 
//   $talon = $this->maxId();
//    $this->insert();
//sacar el maximo id he imprimirlo en el campo boleta
// }
//strlen($this->formatGuia($request['guia'])

        /*   $guiaFormateada = $this->formatGuia($guia);
          if ($guiaFormateada != false) {

          $data = array(
          'guia' => $guiaFormateada,
          'boleta' => $this->animal->ultimoAnimal()//inyectar
          );
          return $data;
          } else {
          return 'Formato Invalido!';
          } */
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
