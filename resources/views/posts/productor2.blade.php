
<div class="panel panel-primary"  style="margin-bottom: 5px">
    <div class="panel-heading" style="padding: 4px">PRODUCTOR</div>
    <div class="panel-body" style="padding: 4px">
        <form class="form-horizontal col-sm-8">
            <div class="form-group" style="margin-bottom: 7px">
                <label for="code" class="col-sm-4" >Codigo:</label>
                <div class="col-sm-8">   
                    <input type="text" name="code" class="form-control" placeholder="Codigo del productor.">   
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
            <div class="form-group" style="margin-bottom: 7px"> 
                <label for="cedProductor"class="control-label col-sm-4" >Cedula:</label>
                <div class="col-sm-8">   
                    <input type="text" name="cedProductor" id="cedProductor"class="form-control" readonly="true" placeholder="Cedula del productor." >   
                </div>
            </div>                       
        </form>     
        <div id="nombreProductor" class="alert alert-info"></div>
        <div class="col-sm-4"  style="padding: 1px;text-align: right;">
            <label for="cedProductor"class="control-label col-sm-4" >#Subasta:</label>            
            <h4 style="margin: 1px"><span class="label label-default">000000009</span></h4> 
        </div>
    </div>
</div>       