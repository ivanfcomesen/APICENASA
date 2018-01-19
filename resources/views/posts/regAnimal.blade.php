
@extends('layouts.panelAnimal')
@section('encabezadoAnimal')
<label class="col-sm-8">Registro de Animales</label>
@endsection
@section('cuerpoAnimal')
<form class="form-horizontal col-sm-12 " style="padding-top:5px">      
    <div class="col-sm-5 form-group" style="padding-left: 7px;padding-right: 7px;margin-bottom: 7px ">               
        <div class="form-group" style="margin-bottom: 7px">            
            <label for="numeroAnimal" class="col-sm-4">#Animal:</label>                   
            <div class="col-sm-8"  style="text-align: center;">                                                                        
                <h3 style="margin: 2px"><span class="label label-default" id="numeroAnimal" name="numeroAnimal"></span></h3>
            </div>
        </div>
        <div class="form-group" style="margin-bottom: 7px">
            <label for="code" class="col-sm-4" >Tipo:</label>
            <div class="col-sm-8">                         
                <input type="text" name="code" id="tipoSubasta" class="form-control" placeholder="Tipo Subasta" > 
            </div>
        </div>     
    </div>               
    <div class="col-sm-4" >
        
        <div class="form-group" style="margin-bottom: 7px">
            <label for="ckCondicion" class="col-sm-6">Condicion:</label>                   
            <div class="col-sm-6"  style="text-align: center;">                                                                        
               <!-- <h4 style="margin: 2px"><span class="label label-default" id="tipoSenasa" name="tipoSenasa"></span></h4> --> 
                <input type="checkbox" name="ckCondicion" id="ckCondicion" class="form-control" style="height: 20px"> 
            </div>
        </div>

        <div class="form-group" style="margin-bottom: 7px">
            <label for="color" class="col-sm-3">Color:</label>
            <div class="col-sm-9"> 
                <input type="text" name="color" id="color" class="form-control" placeholder="Color." > 
            </div>                   
        </div>

    </div> 
    <div class="col-sm-3">        
        <button id="agregarFila" type="button" class="btn btn-success" style="margin-bottom:5px;margin-left: 12px"><span class="glyphicon glyphicon-arrow-down"></span></button>                
        <button id="quitarFila" type="button" class="btn btn-danger" style="margin-bottom:5px;margin-left: 12px" ><span></span></button>
    </div>          
    @include('posts.tabla') 
</form> 
@endsection
