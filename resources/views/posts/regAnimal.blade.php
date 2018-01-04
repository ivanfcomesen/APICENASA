
    <div class="panel panel-primary" style="margin-bottom: 5px">
        <div class="panel-heading col-sm-12" style="padding: 2px">

        <label class="col-sm-8">Registro de Animales</label></div>
        <div class="panel-body" style="padding: 4px">
            <form class="form-horizontal col-sm-12 " style="padding-top:5px">
                <div class="col-sm-5" style="padding-left: 7px;padding-right: 7px">
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
                <div class="col-sm-5" style="padding-left: 7px;padding-right: 7px">
                   <div class="form-group" style="margin-bottom: 7px">
                        <label for="tipoSENASA" class="col-sm-4">SENASA:</label>                   
                        <div class="col-sm-6"  style="text-align: center;">                                                                        
                            <h4 style="margin: 2px"><span class="label label-default" id="tipoSENASA" name="tipoSENASA">Novillo</span></h4>
                        </div>
                    </div>
                    <div class="form-group" style="margin-bottom: 7px">
                        <label for="color" class="col-sm-4">Color:</label>
                        <div class="col-sm-6"> 
                            <input type="text" name="color" id="color" class="form-control" placeholder="Color." > 
                        </div>                   
                    </div>                                                        
                </div> 
                <div class="col-sm-2 text-left">        
                    <button id="agregarFila" type="button" class="btn btn-success" style="margin-bottom: 5px">Agregar</button>                
                    <button id="quitarFila" type="button" class="btn btn-danger">Quitar</button>
                </div>  
                  
                @include('posts.tabla') 
          </form> 
        </div>  
    </div>
