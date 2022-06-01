@extends('plantilla')
@section('content')
	<div class="content-wrapper">
		<section class="content-header">
			<h1 style="font-family:algeria;">Gestor de  Doctores</h1>
		</section>
		<section class="content">
			<div class="box">
				<div class="box-header">
					<a href="Crear-Doctor"><button class="btn btn-primary btn-lg fa fa-plus-square" > Agregar Doctor</button></a>
				</div>

				<div class="box-body">
					<table class="table table-bordered table-hover table-striped">
						<thead>
							<tr>
								{{-- <th style="text-align: center;">ID</th> --}}
								<th style="text-align: center;">Nombre y Apellido</th>
								<th style="text-align: center;">Consultorio</th>
								<th style="text-align: center;">Email</th>
								<th style="text-align: center;">Cedula</th>
								<th style="text-align: center;">Telefono</th>
								<th style="text-align: center;">Acciones</th>
							</tr>
						</thead>
						<tbody>
							@foreach($doctores as $doctor)
								@if($doctor->rol == "Doctor")
								<tr>
									{{-- <td style="text-align: center;">{{$doctor->id}}</td> --}}
									<td style="text-align: center;">{{$doctor->name}}</td>
									<td style="text-align: center;">{{$doctor->CON->consultorio}}</td>
									<td style="text-align: center;">{{$doctor->email}}</td>
									@if($doctor->documento != "")
										<td style="text-align: center;">{{$doctor->documento}}</td>
									@else
										<td style="text-align: center;">Aun no registra</td>
									@endif
									@if($doctor->telefono != "")
										<td style="text-align: center;">{{$doctor->telefono}}</td>
									@else
										<td style="text-align: center;">Aun no registra</td>
									@endif
									<td style="text-align: center;">
										<a href="Editar-Doctor/{{ $doctor->id}}" >
											<button class=" btn btn-success fa fa-pencil-square-o"></button>
										</a>
										<button class="btn btn-danger  EliminarDoctor fa fa-trash-o " Did="{{$doctor->id}}"></button>
									</td>
								</tr>
								@endif
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
		</section>
	</div>

@endsection