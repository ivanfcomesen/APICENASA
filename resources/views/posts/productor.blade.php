@extends('layouts.app')

@section('content')

<div class="container">
    <div id="alert" class="alert alert-info"></div>
    <div class="col-md-5">
        <div class="panel panel-default">
            <div class="panel-heading">{{$data['nameSubata']}}</div>

            <div class="panel-body">
                <form class="form-horizontal">
                    <label for="codEstablec" >Cod.Establecimiento:  </label>
                    <input type="text"name="codEstablec" value="{{$data['code']}}"><br>
                    <label for="codBarras">Cod. Barras Estbl:</label>
                    <input type="text"name="codBarras" style="margin-left:7%;"><br>
                    <label for="numSubasta">Numero Subasta:</label>
                    <input type="text"name="numSubasta" style="margin-left:7%;"><br>
                    <label for="cedResp">Cedula responsable:</label>
                    <input type="text"name="cedResp" value=""><br><br>
                    <label for="numGuia">Numero de guia:</label>
                    <input type="text" name="numGuia" id="numeroGuia"style="margin-left:7%;"><br>
                    <label for="bolet">Boleta sub. Numero:</label>
                    <input type="text" name="bolet" id="talonario" readonly="true">
                    <label for="estado">Estado</label>
                    <input type="text" name="estado" id="estado" style="margin-left:27%;"><br>
                    <label for="">Fecha Recepcion:</label>
                    <input type="text" name="fname" id="estado" style="margin-left:5%;">
                </form>

            </div>
        </div>        
        <div class="panel panel-default">
            <div class="panel-heading">PRODUCTOR</div>
            <div class="panel-body">
                <form class="form-horizontal" >
                    <label for="code">Codigo:</label>
                    <input type="text" name="code" style="margin-left:12%;"><br>
                    <label for="name">Nombre:</label>
                    <input type="text" name="name" style="margin-left:10%;"><br>
                    <label for="finca">Finca Origen: </label>
                    <input type="text" name="finca"><br>
                    <label for="cedt">Cedula</label>
                    <input type="text" name="cedt" id="cedProductor"  style="margin-left:12%;"><br>
                    <button type="submit" class="btn btn-primary" style="margin-left:12%;" id="btnCedProductor">
                        Consultar Cedula
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
                    <input type="text" name="dest" style="margin-left:12%;"><br>
                    <label for="barras">Cod Barras:</label>
                    <input type="text" name="barras"style="margin-left:5%;"><br>
                    <label for="codtbl">Cod Establ: </label>
                    <input type="text" name="codtbl"style="margin-left:4%;"><br>
                    <label for="ced">Cedula</label>
                    <input type="text" name="ced"style="margin-left:12%;"><br>
                    <label for="flete">Monto Flete:</label>                
                    <input type="text" name="flete"style="margin-left:2%;"><br>
                    <label for="resp">Nombre Resp </label>
                    <input type="text" name="resp"><br>
                    <label for="placa">Placa:</label>
                    <input type="text" name="placa" style="margin-left:15%;">
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script src="{{ asset('js/script.js') }}"></script>
@endsection