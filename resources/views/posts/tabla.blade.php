<div class="col-sm-12">
    <div class="col-sm-12 text-center" style="margin-bottom: 5px">        
         <button id="agregarFila" type="button" class="btn btn-sm">Agregar</button>
    </div>
       
    <table  class="table table-hover">
        <thead style="display: block;" >
            <tr class="active"  >
                <th style=" width:100px;">Animal</th>
                <th style=" width:140px;">Tipo Subasta</th>  
                <th style=" width:140px;"> Tipo SENASA</th>
                <th style=" width:100px;">Color</th>
            </tr>
        </thead>
        <tbody id="tablaAnimales" style="display: block; height: 145px; overflow-y: auto;overflow-x: hidden;">
            <tr >
                <td style=" width:100px;">01</td>
                <td style=" width:140px;">02</td> 
                <td style=" width:140px;">01</td>
                <td style=" width:100px;">04</td>
            </tr>                               
        </tbody>
    </table> 

</div>
@include('posts.totales') 
