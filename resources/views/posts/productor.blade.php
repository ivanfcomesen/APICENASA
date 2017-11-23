@extends('layouts.app')

 @section('content')
 <div class="container">
 <div class="col-md-5">
		<div class="panel panel-default">
			<div class="panel-heading">{{$respuesta}}</div>

			<div class="panel-body">
                            Numero de la guia: <input type="text" name="fname"><br><br>
                                Boleta sub. Numero: <input type="text" name="fname">
			</div>
		</div>
 </div>
 </div>
 
@endsection
 