<?php

namespace App\EndPointsSENASA;

use GuzzleHttp\Client;

class Cliente {

    protected $cliente;

    public function __construct() {

        $this->cliente = new Client([
            'base_uri' => 'http://test-tgrupal.addax.cc',
            'timeout' => 5.0,
            'Key' => 'S2V5IHRlbXBvcmFsIHBhcmEgc3ViYXN0YXMu',
        ]);
    }

    public function remove_utf8_bom($text) {
        $bom = pack('H*', 'EFBBBF');
        $text = preg_replace("/^$bom/", '', $text);
        return $text;
    }

    public function getPeticion($string) {

        $request = $this->cliente->request('GET', $string);
        return json_decode($this->remove_utf8_bom($request->getBody()->getContents()), true);
    }

    public function login() {

        $user = "rgonzales@hotmail.com";
        $pass = "rgonzales";

        //return json_decode($login, true);
        return $this->getPeticion('/popupnocss.php?module=Users&func=loginfromcurlmd5&email='
                        . $user . '&password=' . $pass . '&app=subasta');
    }

    public function codeEstablishment() {

        //return json_decode($codigo, true);
        return $this->getPeticion('/zf_Trazabilidad/Popup/obtenercodigoestablecimientoautorizado/'
                        . 'key/' . $this->cliente->getConfig()['Key']);
    }

    public function nameEstablishment($codigo) {

        return $this->getPeticion('/zf_Trazabilidad/Popup/obtenernombreestablecimiento/establecimiento/'
                        . $codigo['codigo'] . '/key/' . $this->cliente->getConfig()['Key']);
    }

    public function stablishmentXCode($codigo) {

        return $this->getPeticion('/zf_Trazabilidad/Popup/obtenerestablecimientoporcodigounico/codigo/'
                        . $codigo['codigo'] . '/key/' . $this->cliente->getConfig()['Key']);
    }

    public function guiaXCodigoDGuia($codigoGuia) {

        //Verifica que exista y retorna # de talonario
        //puede responder la guia no existe y tambien La guia no esta asignada a un talonario
        $stablishment = $this->codeEstablishment();
        return $this->getPeticion('/zf_Trazabilidad/Popup/obteneredatosguiaporcodigoguia/codigo/'
                        . $codigoGuia . '/usuario/' . $stablishment['userid'] . '/subasta/' . $stablishment['codigo'] .
                        '/key/' . $this->cliente->getConfig()['Key']);
    }

    
    public function verificaExiste($codigoGuia, $subasta) {
        //No es necesario usar
        $stablishment = $this->codeEstablishment();
        $guia = $this->guiaXCodigoDGuia();

        return $this->getPeticion('/zf_Trazabilidad/Popup/verificarexistenciadeguia/talonario/' . $guia['codigo_talonario'] .
                        '/guia/' . $codigoGuia . '/usuario/' . $stablishment['userid'] . '/subasta/' . $subasta .
                        '/key/' . $this->cliente->getConfig()['Key']);
    }

}
