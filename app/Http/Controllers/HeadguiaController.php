<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use GuzzleHttp\Client;
use App\EndPointsSENASA;

class HeadguiaController extends Controller {

    protected $cliente;

    public function __construct(EndPointsSENASA\Cliente $cliente) {

        $this->cliente = $cliente;
    }

    public function index() {

        $data = $this->cliente->login();

        return $data;
        //if ((json_decode($login->getBody(), true)['login_result']) == true) { 
    }


    public function verificaExiste($talonario, $guia, $usuario, $subasta) {

        $client = new Client([
            'base_uri' => 'http://test-tgrupal.addax.cc',
            'timeout' => 5.0,
        ]);
        $guia = $client->request('GET', '/zf_Trazabilidad/Popup/verificarexistenciadeguia/' . 'talonario' .
                '$numero' . 'usuario' . 'subasta' . 'key/S2V5IHRlbXBvcmFsIHBhcmEgc3ViYXN0YXMu');
        return '';
    }

    public function maxId() {
        $conn = DB::connection("odbc");
        $sql = "Select max(id) as topId from Conse_Boleta";
        $resultado = $conn->selectOne($sql);
        $num = $resultado->topId + 1;
        return ("0000000" . $num);
    }

    public function insert() {

        $conn = DB::connection("odbc");
        $sql = "INSERT INTO Conse_Boleta (Consecutivo)" . "VALUES('" . $this->maxId() . "')";
        //echo $sql;
        $conn->insert($sql);
        //    return view('posts.productor');
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
