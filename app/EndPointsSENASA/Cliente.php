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

    public function login() {

        $user = "rgonzales@hotmail.com";
        $pass = "rgonzales";

        $login = $this->cliente->request('GET', '/popupnocss.php?module=Users&func=loginfromcurlmd5&email='
                . $user . '&password=' . $pass . '&app=subasta');

        //  var_dump($login->getBody()->getContents());

        return json_decode($login->getBody(), true);
    }

    public function codeEstablishment() {

        $codigo = $this->cliente->request('GET', '/zf_Trazabilidad/Popup/obtenercodigoestablecimientoautorizado/'
                . 'key/' . $this->cliente->getConfig()['Key']);

        $probando = $this->remove_utf8_bom($codigo->getBody()->getContents());
//        echo $probando;     

        return json_decode($probando, true);
    }

    public function nameEstablishment($codigo) {

        $nombre = $this->cliente->request('GET', '/zf_Trazabilidad/Popup/obtenernombreestablecimiento/establecimiento/'
                . $codigo['codigo'] . '/key/' . $this->cliente->getConfig()['Key']);
        return json_decode($nombre->getBody(), true);
    }

    public function verificaExiste($talonario, $guia, $usuario, $subasta) {

        $existe = $this->cliente->request('GET', '/zf_Trazabilidad/Popup/verificarexistenciadeguia/talonario/' . $talonario .
                '/guia/' . $guia . '/usuario/' . $usuario . '/subasta/' . $subasta . '/key/' . $this->cliente->getConfig()['Key']);

        return json_decode($existe->getBody(), true);
    }

}
