@extends('layouts.app')

@section('content')

<div class="container">
    <div id="alert" class="alert alert-info"></div>
    <div class="col-md-6">
        <div class="panel panel-default">
            <div class="panel-heading">{{$data['nameSubata']}}&emsp;&emsp;&emsp;&emsp;&emsp;{{$data['code']}}</div>
            <div class="panel-body">

                <label for="numGuia" style="width: 15%"># Guia:</label>
                <input type="text" name="numGuia" id="numeroGuia">                     
                <div style="text-align:right;">Boleta # 00000778</div>

            </div>
        </div>   
        <div class="panel panel-default">
            <div class="panel-heading">PRODUCTOR</div>
            <div class="panel-body">
                <form >                   
                    <label for="code" >Codigo:</label>
                    <input type="text" name="code" ><br>    
                    <label for="name" >Nombre:</label>
                    <input type="text" name="name" ><br>
                    <label for="finca">Finca: </label>
                    <input type="text" name="finca"><br>
                    <label for="cedt">Cedula:</label>
                    <input type="text" name="cedt" id="cedProductor" ><br><br><br>                    
                    <button type="submit" class="btn btn-info" id="btnCedProductor">
                        Buscar Ced.
                    </button>
                </form>

            </div>

        </div>       

        <div class="panel panel-default">
            <div class="panel-heading">MARCAS DE FIERROS</div>
            <br> <br>
            <div class="panel-body"></div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">TRANSPORTISTA</div>
            <div class="panel-body">
                <form class="form-horizontal" >
                    <label for="dest"> Destino: </label>
                    <input type="text" name="dest"><br>
                    <label for="barras">Cod Barras:</label>
                    <input type="text" name="barras"><br>
                    <label for="codtbl">Cod Establ: </label>
                    <input type="text" name="codtbl"><br>
                    <label for="ced">Cedula</label>
                    <input type="text" name="ced"><br>
                    <label for="flete">Monto Flete:</label>                
                    <input type="text" name="flete"><br>
                    <label for="resp">Nombre Resp </label>
                    <input type="text" name="resp"><br>
                    <label for="placa">Placa:</label>
                    <input type="text" name="placa">
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script src="{{ asset('js/script.js') }}"></script>
@endsection