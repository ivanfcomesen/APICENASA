<div class="panel panel-primary" style="margin-bottom: 5px">
    <div class="panel-heading col-sm-12"  style="padding: 2px">
        <label class="col-sm-4">Transportista:</label>
        <label class="col-sm-6 pull-right" style="text-align: right;" id="nombreTransportista" ></label></div>
    <div class="panel-body"  style="padding: 4px">
        <form class="form-horizontal col-sm-8"style="padding-top: 5px">

            <div class="form-group" style="margin-bottom: 7px">
                <label for="codigoTransportista" class="col-sm-4" >Codigo:</label>
                <div class="col-sm-8"> 
                    <input type="text" name="codigoTransportista" id="codigoTransportista" class="form-control"placeholder="Codigo del transportista." >   
                </div> 
            </div>
            <div class="form-group" style="margin-bottom: 7px">
                <label for="cedTransporte" class="col-sm-4">Cedula</label>
                <div class="col-sm-8"> 
                    <input type="text" name="cedTransporte" id="cedTransporte"class="form-control" readonly="true" placeholder="Cedula juridica.">
                </div> 
            </div>   
            <div class="form-group" style="margin-bottom: 7px">
                <label for="numeroAnimal" class="col-sm-4">Placa:</label>                   
                <div class="col-sm-8"> 
                    <input type="text" name="placa" class="form-control" readonly="true" placeholder="Placa del vehiculo"> 
                </div> 
            </div>                                                
        </form>
        <div class="col-sm-4"  style="padding: 1px;text-align: right;">
            <label class="control-label col-sm-4" >Numero Subasta</label>           
            <h4 style="margin: 1px;margin-top: 8px"><span class="label label-default" id="numeroSub"></span></h4>             
            <h4 style="margin: 1px"><span class="label label-info" id="alertTransportista"></span></h4> 
        </div>
        <div style="padding: 1px;" class="col-sm-4 pull-right">
            <label for="flete" class="col-sm-12">Flete:</label>                   
            <div class="col-sm-12"  style="text-align: center;">                                                                        
                <input type="text" name="flete" class="form-control"  placeholder="Monto del flete.">    
            </div>
        </div>
    </div>
</div>