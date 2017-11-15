<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use GuzzleHttp\Client;

//use App\Conse_Boleta;

class HeadguiaController extends Controller {

    public function index() {

        $client = new Client([
            'base_uri' => 'http://test-tgrupal.addax.cc',
            'timeout' => 5.0,
        ]);
        $login = $client->request('GET', '/popupnocss.php?module=Users&func=loginfromcurlmd5&email=rgonzales@hotmail.com&password=rgonzales&app=subasta');
        $codigo = $client->request('GET', '/zf_Trazabilidad/Popup/obtenercodigoestablecimientoautorizado/key/S2V5IHRlbXBvcmFsIHBhcmEgc3ViYXN0YXMu');

        //se llama a nombreestablecimiento y se pasa como parametro el contenido de codigo en el JSON
        //$nombre = $client->request('GET', '/zf_Trazabilidad/Popup/obtenernombreestablecimiento/establecimiento/'
        //        . $codigo->codigo . '/key/S2V5IHRlbXBvcmFsIHBhcmEgc3ViYXN0YXMu/');
        // $posts = $response->getBody()->getContents();

        return $codigo->getBody();
    }

    public function verificaExiste($talonario,$guia,$usuario,$subasta) {

        $client = new Client([
            'base_uri' => 'http://test-tgrupal.addax.cc',
            'timeout' => 5.0,
        ]);
        $guia = $client->request('GET', '/zf_Trazabilidad/Popup/verificarexistenciadeguia/' . 'talonario' .
                '$numero' . 'usuario' . 'subasta' . 'key/S2V5IHRlbXBvcmFsIHBhcmEgc3ViYXN0YXMu');
        
        

        return '';
    }

    public function maxId() {
        //Perfecto
        $conn = DB::connection("odbc");
        $sql = "Select max(id) as topId from Conse_Boleta";
        $resultado = $conn->selectOne($sql);
        //("0000000" . $resultado->topId);        
        return view('posts.productor');
    }

    public function insert() {
        //Perfecto
        $conn = DB::connection("odbc");
        $sql = "INSER INTO Conse_Boleta (INSERT INTO Conse_Boleta (Consecutivo) VALUES('00000001')";

        // $conn->insert($sql, array(''));
        //  $resultado = $conn->insert($sql);
        //  var_dump($resultado);

        return view('posts.productor');
    }

    public function update() {
        //Perfecto
        $conn = DB::connection("odbc");
        $sql = "UPDATE Conse_Boleta";
        $resultado = $conn->update($sql);
        var_dump($resultado);

        return view('posts.productor');
    }

}
