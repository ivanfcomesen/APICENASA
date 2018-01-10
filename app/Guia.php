<?php

namespace App;



class Guia {

    protected $guia;
    protected $conexion;
        
        public function guiaExiste($guia) {

//     $data = $this->cliente->guiaXCodigoDGuia($guia);
//      if ($data['resultado'] == 1) {
// $talonario = $request['guia'];
//Pintar en el Campo Boleta el codigo de talonario 
//   $talon = $this->maxId();
//    $this->insert();
//sacar el maximo id he imprimirlo en el campo boleta
// }
//strlen($this->formatGuia($request['guia'])
      
            $guia = $this->formatGuia($guia);
        if ($guia != false) {
            $data = array(
                'guia' => $guia,
                'boleta' => $this->ultimoAnimal());
            return $data;
        } else {
            return 'Formato Invalido!';
        }
    }

    public function formatGuia($guia) {
//$request['cedula']
        if (((strlen($guia)) < 14) or ( strlen($guia) > 14)) {
            return false;
        } else {
            $respuesta = substr_replace($guia, '-', 6, -7);
            return $respuesta;
        }
    }

}
