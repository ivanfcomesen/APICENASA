<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\EndPointsSENASA\Cliente;

class HeadguiaController extends Controller {

    protected $cliente;

    public function __construct(Cliente $cliente) {
        $this->cliente = $cliente;
    }

    public function index() {

       //  $login = $this->cliente->login();
        // if ($login['login_result'] == true) {         
        
      //  $data = $this->cliente->codeEstablishment();
    //    dd($data);
        //     $code = $data['codigo']; //NO HAY DATA VALOR DE CODIGO NULL.
        //  $name = $this->cliente->nameEstablishment($code);
        //   $nameSubasta = $name['nombre'];
         $nameSubasta = 'SUBASTA CAMARA DE GANADEROS PZ';
        //  } else {
        //      return "Problemas con el login";
        //  }
      //  print_r($data);
        //  
         return view('posts.productor')->with('nameSubasta', $nameSubasta);
    }

    public function guiaExiste(Request $request, $codigoGuia) {              
        
        if($request->ajax()){
            
            $talonario = $this->maxId();
            return $talonario;
        }
                
      // $data = $this->cliente->guiaXCodigoDGuia($codigoGuia);
     //  $talonario ="";
        
      //  if($data['resultado']==1){
          //  $talonario = $data['codigo_talonario'];
            //Pintar en el Campo Boleta el codigo de talonario 
       // }else{//guia no existe
          //   $talonario = $this->maxId();
           //  $this->insert();
            //sacar el maximo id he imprimirlo en el campo boleta
       // }
            return $talonario;
    }
    
     public function destroyProduct(Request $request, $id)
    {
        if($request->ajax()){            
            $product = \App\Product::find($id);
            $product->delete();
            $products_total = \App\Product::all()->count();
            
            return response()->json([
                'total' => $products_total,
                'message' =>  $product->name . ' fue eliminado correctamente'
            ]);
           
        }
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
