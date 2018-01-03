<div class="col-sm-12">
    <div class="col-sm-12 text-center" style="margin-bottom: 5px">        
         <button id="agregarFila" type="button" class="btn btn-sm">Agregar</button>
         <button id="quitarFila" type="button" class="btn btn-sm">Quitar</button>
    </div>
       
    <table  class="table table-hover" id="tablaAnimales">
        <thead style="display: block;" >
            <tr class="active"  >
                <th style=" width:100px;">Animal</th>
                <th style=" width:140px;">Tipo Subasta</th>  
                <th style=" width:140px;"> Tipo SENASA</th>
                <th style=" width:100px;">Color</th>
            </tr>
        </thead>
        <tbody  style="display: block; height: 145px; overflow-y: auto;overflow-x: hidden;">
                                
        </tbody>
    </table>     

</div>
@include('posts.totales') 
