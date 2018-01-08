
<table  class="table table-hover" id="tablaAnimales"  style="margin-bottom: 5px">
    <thead style="display: block;" >
        <tr class="active"  >
            <th style=" width:100px;">Animal</th>
            <th style=" width:140px;">Tipo Subasta</th>  
            <th style=" width:140px;"> Tipo SENASA</th>
            <th style=" width:100px;">Color</th>
        </tr>
    </thead>
    <tbody  style="display: block; height: 200px; overflow-y: auto;overflow-x: hidden;">

    </tbody>

    <tfoot  style="display: block;margin-bottom: 5px">
        <tr>
            <th colspan="3">Total de animales:</th>              
        </tr>
        <tr class="active" style=" width:160px;">
            <td style=" width:160px;">Toros:<span id="toros">0</span></td>
            <td style=" width:160px;" >Novillos:<span id="vacas">0</span></td>
            <td  style=" width:160px;">Terneros:<span id="terneros">0</span></td>
        </tr>
        <tr class="active">
            <td>Vacas <span id="toretes">0</span></td>
            <td>Novillas:<span id="vaquillas">0</span></td>
            <td>Terneras:<span id="terneras">0</span></td>
        </tr>
    </tfoot>
</table>     
@include('posts.totales') 
