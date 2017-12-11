@extends('layouts.app')

@section('content')

<div class="container">

    <div class="col-md-6">
        <div class="panel panel-default">
            <div class="panel-heading">{{$data['nameSubata']}}&emsp;&emsp;&emsp;&emsp;&emsp;{{$data['code']}}</div>
            <div class="panel-body">
                <div id="alert" class="alert alert-info"></div>
                <label for="numGuia" style="width: 15%"># Guia:</label>
                <input type="text" name="numGuia" id="numeroGuia">                     
                <label style="text-align:right;" id="talonario"></label>
            </div>
        </div>   
        <div class="panel panel-default">
            <div class="panel-heading">PRODUCTOR</div>
            <div class="panel-body">
                <label for="code" >Codigo:</label>
                <input type="text" name="code" >  
                <div style="text-align:right;" id="numeroSubasta"></div><br>                
                <label for="finca">Finca: </label>
                <input type="text" name="finca"><br><br>
                <label for="codStl">COD. ESTABL:</label>
                <input type="text" name="codStl" id=""><br><br>
                <label for="cedProductor">Cedula:</label>
                <input type="text" name="cedProductor" id="cedProductor" ><br><br>
                <button type="submit" class="btn btn-info" id="btnCedProductor">
                    Buscar Ced.
                </button><br><br>
                <div id="nombreProductor" class="alert alert-info" style="width: 68%"></div>
            </div>
        </div>       
        <div class="panel panel-default">
            <div class="panel-heading">MARCAS DE FIERROS</div>
            <br> <br>
            <div class="panel-body"></div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="panel panel-default">
            <div class="panel-heading">TRANSPORTISTA</div>
            <div class="panel-body">
                <form class="form-horizontal" >
                    <label for="code" >Codigo:</label>
                    <input type="text" name="code" >  <br>  
                    <div style="text-align:right;" ></div><br>                
                    <label for="ced">Cedula</label>
                    <input type="text" name="ced"><br><br>

                    <label for="resp">Nombre Resp </label>
                    <input type="text" name="resp"><br><br>
                    <label for="flete">Monto Flete:</label>                
                    <input type="text" name="flete"><br><br>
                    <label for="placa">Placa:</label>
                    <input type="text" name="placa">
                </form>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">Registro de Animales</div>

            <div class="panel-body">

                <div class="form-group">
                    <label for="anm">Animal #</label>
                    <input type="text" name="anm"><br><br>            
                    <label for="sel1">Tipo</label>
                    <select class="form-control" id="sel1">
                        <option>Toro</option>
                        <option>Torete</option>
                        <option>Ternero</option>
                        <option>Vaca</option>
                        <option>Vaquilla</option>
                        <option>Ternera</option>
                        <option>Va Parida</option>
                        <option>Equiono</option>
                        <option>Ovinos</option>
                        <option>Bueyes</option>
                        <option>Cerdo</option>
                    </select>    
                    <label for="sel1">Color</label>
                    <select class="form-control" id="sel1">
                        <option>Blanco</option>
                        <option>Negro</option>
                        <option>Rojo</option>
                        <option>Barcino</option>
                        <option>Josco</option>
                        <option>Bayo</option>
                        <option>Holsten</option>
                        <option>Pardo</option>
                        <option>GYR</option>                        
                    </select><br>
                    <label>Observaciones:</label>
                    <textarea class="form-control" rows="3"></textarea>
                </div> 
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script src="{{ asset('js/script.js') }}"></script>
@endsection