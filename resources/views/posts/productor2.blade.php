<div class="panel panel-primary" style="margin-bottom: 5px">
    <div class="panel-heading col-sm-12"  style="padding: 2px">
        <label class="col-sm-4"  id="">Productor:</label>
        <label class="col-sm-6 pull-right" style="text-align: right;" id="nombreProductor"></label>
    </div>
    <div class="panel-body"  style="padding: 4px">
        <form class="form-horizontal col-sm-8" style="padding-top: 5px">

            <div class="form-group" style="margin-bottom: 7px">
                <label for="codigoProductor" class="col-sm-4" >Codigo:</label>
                <div class="col-sm-8">   
                    <input type="text" name="codigoProductor" id="codigoProductor" class="form-control" placeholder="Codigo del productor.">   
                </div>
            </div>
            <div class="form-group" style="margin-bottom: 7px"> 
                <label for="finca" class="control-label col-sm-4">Finca: </label>
                <div class="col-sm-8">   
                    <input type="text" name="finca" class="form-control" readonly="true" placeholder="Finca.">  
                </div>
            </div>
            <div class="form-group" style="margin-bottom: 7px"> 
                <label for="codStl" class="control-label col-sm-4" >Cod. Establ:</label>
                <div class="col-sm-8">   
                    <input type="text" name="codStl" id="" class="form-control" readonly="true" placeholder="Codigo de establecimiento.">
                </div>
            </div>                   
        </form>             
        <div class="col-sm-4"  style="padding: 1px;text-align: right;">
            <label class="control-label col-sm-4" >Numero Subasta</label>           
            <h4 style="margin: 1px;margin-top: 8px"><span class="label label-default" id="numeroSubastaProductor"></span></h4> 
            <h4 style="margin: 1px;margin-top: 8px"><span class="label label-default" id="talonario"></span></h4>             
        </div>
        <div style="padding: 1px;margin-top: 5px" class="col-sm-4 pull-right">
            <label for="cedula" class="col-sm-12">Cedula:</label>                   
            <div class="col-sm-12"  style="text-align: center;">                                                                        
                <input type="text" name="cedula" class="form-control"  placeholder="Cedula productor." readonly="true">    
            </div>
        </div>
    </div>

</div>
