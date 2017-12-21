<div class="panel panel-primary" style="margin-bottom: 5px">
    <div class="panel-heading" style="padding: 4px">Registro de Animales</div>
    <div class="panel-body" style="padding: 4px">
        <form class="form-horizontal col-sm-12" style="padding-left: 7px;padding-right: 7px">
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
                        <input type="text" name="tipoSenasa" class="form-control"placeholder="Tipo SENASA" >
                    </div>                   
                </div>   
                <div class="form-group" style="margin-bottom: 7px">
                    <label for="code" class="col-sm-4">Color:</label>
                    <div class="col-sm-8"> 
                        <input type="text" name="code"class="form-control" placeholder="Color del animal." > 
                    </div>                   
                </div>                                                        
            </div>  
            <div>              
                <table  class="table table-bordered ">
                    <thead>
                        <tr class="active" >
                            <th>Animal</th>
                            <th>Tipo Subasta</th>  
                            <th>Tipo SENASA</th>
                            <th>Color</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Vaca</td>
                            <td>VaParida</td> 
                            <td>VaParido</td>
                            <td>Amarillo</td>
                        </tr>
                        <tr>
                            <td>Cerdo</td>
                            <td>VaParida</td> 
                            <td>VaParido</td>
                            <td>Verde</td>
                        </tr>
                        <tr>
                            <td>Vaca</td>
                            <td>VaParida</td> 
                            <td>VaParido</td>
                            <td>Gris</td>
                        </tr>
                    </tbody>
                </table>     
            </div>
        </form>
    </div> 
</div>
</div>