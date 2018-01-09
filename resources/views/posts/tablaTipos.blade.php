@extends('layouts.codigoRegistroSubasta')
@section('tablaTipos')
<table  id="tablaAnimales"  style="width: 100%;background-color: whitesmoke">
    <thead>                
        <tr style=>
            <th class="active" colspan="2" style="background-color: palegoldenrod">Tipos de Animales</th>                    
        </tr>
        <tr>                    
            <th>Codigo</th>
            <th>Descripcion</th>  
        </tr>
    </thead>
    <tbody style="background-color: whitesmoke">       
        @foreach ($data['tablaTipos'] as $tipo)
        <tr>
            <td>{{ $tipo['Cod_Animal'] }}</td>
            <td>{{ $tipo['Descripcion'] }}</td>
        </tr>
        @endforeach    
    </tbody>
</table>
<table id="tablaColores" style="width: 100%;background-color:whitesmoke " >
    <thead>                
        <tr>
            <th colspan="2" style="background-color: palegoldenrod">Colores de Animales</th>                    
        </tr>
        <tr>                    
            <th>Codigo</th>
            <th>Color</th>  
        </tr>
    </thead>
    <tbody>
        @foreach ($data['tablaColores'] as $tipo)
        <tr>
            <td>{{ $tipo['Cod_Color'] }}</td>
            <td>{{ $tipo['Descripcion'] }}</td>
        </tr>
        @endforeach    
    </tbody>
</table>    
@endsection