<div class="col-sm-12">
    <div class="panel panel-primary" style="margin-bottom: 5px">
        <div class="panel-heading" style="padding: 4px">Registro de Animales</div>
        <div class="panel-body" style="padding: 4px">
            <form class="form-horizontal " style="padding-left: 7px;padding-right: 7px">
                <div class="col-sm-6" style="padding-left: 7px;padding-right: 7px">
                    <div class="form-group" style="margin-bottom: 7px">
                        <label for="numeroAnimal" class="col-sm-4">#Animal:</label>                   
                        <div class="col-sm-8"  style="text-align: center;">                                                                        
                            <h2 style="margin: 2px"><span class="label label-default" id="numeroAnimal"></span></h2>
                        </div>
                    </div>
                    <div class="form-group" style="margin-bottom: 7px">
                        <label for="code" class="col-sm-4" >Subasta:</label>
                        <div class="col-sm-8">                         
                            <input type="text" name="code" id="tipoSubasta" class="form-control" placeholder="Tipo Subasta" > 
                        </div>
                    </div>
                </div>
                <div class="col-sm-6" style="padding-left: 7px;padding-right: 7px">
                    <div class="form-group" style="margin-bottom: 7px">
                        <label for="tipoSenasa" class="col-sm-4">SENASA:</label>                   
                        <div class="col-sm-8"> 
                            <input type="text" name="tipoSenasa" id="tipoSenasa" class="form-control"placeholder="Tipo SENASA" >
                        </div>                   
                    </div>   
                    <div class="form-group" style="margin-bottom: 7px">
                        <label for="color" class="col-sm-4">Color:</label>
                        <div class="col-sm-8"> 
                            <input type="text" name="color" id="color"class="form-control" placeholder="Color del animal." > 
                        </div>                   
                    </div>                                                        
                </div>    
                @include('posts.tabla') 
            </form> 
        </div>  
    </div>
</div>