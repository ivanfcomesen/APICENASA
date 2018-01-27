
@extends('layouts.panelGuia')
@section('encabezadoGuia')
<label class="col-sm-8">{{$data['nameSubata']}}</label>
<label class="col-sm-4 pull-right" style="text-align: right">{{$data['code']}}</label>

@endsection

@section('cuerpoGuia')
<div class="panel-body" style="padding: 4px">
    <form class="form-horizontal col-sm-8" style="padding-top: 5px;padding-right: 7px;">

        <h3 class="col-sm-1" style="margin: 1px;padding: 1px;">
            <span class="glyphicon glyphicon-barcode"></span>
        </h3>
        <div class="form-group col-sm-11" style="margin-bottom: 5px;padding-right: 7px"> 
            <label for="numGuia" class="control-label col-sm-2" >Guia: </label>
            <div class="col-sm-10">   
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

@include('layouts.panelMarcas') 


@endsection

