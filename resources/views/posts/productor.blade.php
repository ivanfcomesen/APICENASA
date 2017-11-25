@extends('layouts.app')

 @section('content')
 <div class="container">
     <div id="alert" class="alert alert-info"></div>
 <div class="col-md-5">
		<div class="panel panel-default">
			<div class="panel-heading">{{$nameSubasta}}</div>

			<div class="panel-body">
                            Numero de la guia: <input type="text" name="fname" id="numeroGuia" onchange=""><br><br>
                            Boleta sub. Numero: <input type="text" name="fname" id="talonario" value="{{'Probando'}}">
			</div>
		</div>
 </div>
 </div>
 
@endsection