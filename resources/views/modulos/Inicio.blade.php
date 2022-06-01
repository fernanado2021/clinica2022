@extends('plantilla')
@section('content')
	<div class="content-wrapper">
		<section class="content-header">
			<h1 style="font-family:algeria;">Inicio</h1>
		</section>
		<section class="content">
			<div class="box">
				<div class="box-body">
					<div class="col-md-6 bg-primary">
						<h3 style="font-family:algeria; text-align: center;">BIENVENIDOS A ÓRBITA MED CLINICA</h3>
						<hr>
						<h3 style="font-family:algeria; text-align: center;">Días:</h3>
						<h4 style="font-family:algeria; text-align: center;">{{$inicio->dias}}</h4>
						<hr>
						<h3 style="font-family:algeria; text-align: center;">Horarios:</h3>
						<h4 style="font-family:algeria; text-align: center;">Desde: {{$inicio->horaInicio}}</h4>
						<h4 style="font-family:algeria; text-align: center;">Hasta: {{$inicio->horaFin}}</h4>
						<hr>
						<h3 style="font-family:algeria; text-align: center;">Direccion:</h3>
						<h4 style="font-family:algeria; text-align: center;">{{$inicio->direccion}}</h4>
						<hr >
						<h3 style="font-family:algeria; text-align: center;">Contactos:</h3>
						<h4 style="font-family:algeria; text-align: center;">Telefono: {{$inicio->telefono}} <br>Correo:{{$inicio->email}}</h4>
					</div>
					<div class="col-md-6">
							<img src="http://localhost/clinica-l8/public/storage/{{$inicio->logo}}" class="img-responsibe" >
					</div>
				</div>
				@if(auth()->user()->rol == "Administrador")
					<div class="box-footer">
						<a href="{{url('Inicio-Editar')}}">
							<button class="btn btn-success">Editar</button>
						</a>
					</div>
				@endif
			</div>
		</section>
	</div>
@endsection