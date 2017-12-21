
<div class="panel panel-primary" style="margin-bottom: 5px">
    <div class="panel-heading" style="padding: 4px">      
        {{$data['nameSubata']}}
        <label class="head">{{$data['code']}}</label>
    </div>
    <div class="panel-body" style="padding: 4px">
        <form class="form-horizontal col-sm-8">
            <div class="form-group" style="margin-bottom: 5px"> 
                <label for="numGuia" class="control-label col-sm-4"># Guia:</label>
                <div class="col-sm-8">   
                    <input type="text" name="cedProductor" id="numeroGuia"class="form-control" placeholder="Numero de guia.">   
                </div>
            </div>   
        </form>        
        <div class="col-sm-4"  style="padding: 1px;text-align: right;">
            <label for="cedProductor"  style="margin-bottom:1px" class="control-label col-sm-4" >Numero Talonario</label>            
            <h4 style="margin: 1px;margin-top: 8px"><span class="label label-default" id="talonario"></span></h4> 
            
            <h4 style="margin: 1px"><span class="label label-info" id="alert"></span></h4> 
        </div>
    </div>
  
</div>  
