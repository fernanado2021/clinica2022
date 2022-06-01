@extends('plantilla')
@section('content')
	<div class="content-wrapper">
		<section class="content-header">
			<h1 style="font-family:algeria;">Gestor de Pacientes</h1>
		</section>
		<section class="content">
			<div class="box">
				<div class="box-header">
					<a href="Crear-Paciente"><button class="btn btn-primary btn-lg fa fa-plus-square" > Agregar Paciente</button></a>
				</div>
				<div class="box-body">
					<table class="table table-bordered table-hover table-striped">
						<thead>
							<tr>
								{{-- <th style="text-align: center;">ID</th> --}}
								<th style="text-align: center;">Nombre y Apellido</th>
								<th style="text-align: center;">Cedula</th>
								<th style="text-align: center;">Email</th>
								<th style="text-align: center;">Telefono</th>
								<th style="text-align: center;">Acciones</th>
							</tr>
						</thead>
						<tbody>
							@foreach($pacientes as $paciente)
								<tr>
									{{-- <td style="text-align: center;">{{$paciente->id}}</td> --}}
									<td style="text-align: center;">{{$paciente->name}}</td>
									<td style="text-align: center;">{{$paciente->documento}}</td>
									<td style="text-align: center;">{{$paciente->email}}</td>
									@if($paciente->telefono != "")
										<td style="text-align:center;">{{$paciente->telefono}}</td>
									@else
										<td style="text-align: center;">No disponible</td>
									@endif

									<td style="text-align: center;">
										<a href="Editar-Paciente/{{ $paciente->id}}" >
											<button class=" btn btn-success fa fa-pencil-square-o"></button>
										</a>
										<button class=" btn btn-danger fa fa-trash-o EliminarPaciente" Pid="{{$paciente->id}}" Paciente="{{$paciente->name}}"></button>
									</td>
								</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
		</section>
	</div>
@endsection