
@extends('layouts.panelGuia')
@section('encabezadoGuia')
<label class="col-sm-8">{{$data['nameSubata']}}</label>
<label class="col-sm-4 pull-right" style="text-align: right">{{$data['code']}}</label>

@endsection

@section('cuerpoGuia')
<div class="panel-body" style="padding: 4px">
    <form class="form-horizontal col-sm-8" style="padding-top: 5px">
        <div class="form-group" style="margin-bottom: 5px"> 
            <label for="numGuia" class="control-label col-sm-4"># Guia:</label>
            <div class="col-sm-8">   
                <input type="text" name="numGuia" id="numeroGuia"class="form-control" placeholder="Numero de guia.">   
            </div>
        </div>   
    </form>        
    <div class="col-sm-4"  style="padding: 1px;text-align: right;">
        <label style="margin-bottom:1px" class="control-label col-sm-4" >Numero Talonario</label>            
        <h4 style="margin: 1px;margin-top: 8px"><span class="label label-default" id="talonario">{{$data['talonario']}}</span></h4> 

        <h4 style="margin: 1px"><span class="label label-info" id="alertGuia"></span></h4> 
    </div>
</div>  

@endsection

