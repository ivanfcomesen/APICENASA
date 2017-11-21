<?php

namespace App\EndPointsSENASA;

use GuzzleHttp\Client;

class Cliente {

    protected $cliente;

    public function __construct() {

        $this->cliente = new Client([
            'base_uri' => 'http://test-tgrupal.addax.cc',
            'timeout' => 5.0,
        ]);
    }

    public function login() {

        $login = $this->cliente->request('GET', '/popupnocss.php?module=Users&func=loginfromcurlmd5&email=rgonzales@hotmail.com&password=rgonzales&app=subasta');

        return json_decode($login->getBody(), true);
    }

    public function codeEstablishment(Client $client) {

        $codigo = $this->client->request('GET', '/zf_Trazabilidad/Popup/obtenercodigoestablecimientoautorizado/key/S2V5IHRlbXBvcmFsIHBhcmEgc3ViYXN0YXMu');
        return json_decode($codigo->getBody(), true);
    }

    public function nameEstablishment(Client $client, $codigo) {

        $nombre = $client->request('GET', '/zf_Trazabilidad/Popup/obtenernombreestablecimiento/establecimiento/' . $codigo['codigo'] . '/key/S2V5IHRlbXBvcmFsIHBhcmEgc3ViYXN0YXMu/');
        return (json_decode($nombre->getBody(), true));
    }

}
