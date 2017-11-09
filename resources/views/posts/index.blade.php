 @extends('layouts.app') @section('content')
<div class="container">
	<div class="col-md-7">
		<div class="panel panel-default">
			<div class="panel-heading">NOMBRE DE LA EMPRESA</div>

			<div class="panel-body">
				Numero de la guia: <input type="text" name="fname"> Boleta sub
				Numero: <input type="text" name="fname">
			</div>
		</div>

			<div class="panel panel-default">
				<div class="panel-heading">PRODUCTOR</div>
				<div class="panel-body">
					Datos Prigen: <input type="text" name="fname"> Finca Origen: <input
						type="text" name="fname"><br> <br> Cod. Establ: <input type="text"
						name="fname"> Cedula Resp <input type="text" name="fname">
				</div>

			</div>


	<div class="panel panel-default">
		<div class="panel-heading">MARCAS DE FIERROS</div>
		<div class="panel-body"></div>
	</div>

	<div class="panel panel-default">
		<div class="panel-heading">TRANSPORTISTA</div>
		<div class="panel-body">
			Cod. Establ: <input type="text" name="fname"> Cod. Subasta:<input
				type="text" name="fname"><br>
			<br> Tipo Establ: <input type="text" name="fname"> Cedula Resp <input
				type="text" name="fname"><br>
			<br> Monto Flete: <input type="text" name="fname"> Nombre Resp <input
				type="text" name="fname"><br>
			<br> Placa: <input type="text" name="fname">
		</div>
	</div>

</div>


<div class="col-md-5">
	<div class="panel panel-default">
		<div class="panel-heading">ANIMALES</div>
		<div class="panel-body">
			Animal# <input type="text" name="fname"><br>
			<br> SENASA TI:<input type="text" name="fname"><br>
		</div>
	</div>

	<div class="panel panel-default">
		<div class="panel-heading">ANIMALES</div>
		<div class="panel-body">
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
		</div>
	</div>


	<div class="panel panel-default">
		<div class="panel-heading">Total Animales Subasta</div>
		<div class="panel-body">
			<br>
			<br>
			<br>
		</div>
	</div>

</div>
</div>

@endsection

