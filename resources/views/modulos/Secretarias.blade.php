@extends('plantilla')
@section('content')
	<div class="content-wrapper">
		<section class="content-header">
			<h1 style="font-family:algeria;">Gestor de Secretarias</h1>
		</section>
		<section class="content">
			<div class="box">
				<div class="box-header">
					{{-- <a href="Crear-Secretaria"><button class="btn btn-primary btn-lg fa fa-plus-square" > Agregar Secretaria</button></a> --}}
					<a href="Crear-Secretaria"><button class="btn btn-primary btn-lg fa fa-plus-square" > Agregar Secretaria</button></a>

				</div>
				<div class="box-body">
					<table class="table table-bordered table-hover table-striped">
						<thead>
							<tr>
								{{-- <th style="text-align:center;">ID</th> --}}
								<th style="text-align:center;">Nombre</th>
								<th style="text-align:center;">Email</th>
								<th style="text-align:center;">Documento</th>
								<th style="text-align:center;">Telefono</th>
								<th style="text-align:center;">Acciones</th>
							</tr>
						</thead>
						<tbody>
							@foreach($secretarias as $secretaria)
								<tr>
									{{-- <td style="text-align: center;">{{$secretaria->id}}</td> --}}
									<td style="text-align: center;">{{$secretaria->name}}</td>
									<td style="text-align: center;">{{$secretaria->email}}</td>
									@if($secretaria->documento != "")
										<td style="text-align: center;">{{$secretaria->documento}}</td>
									@else
										<td style="text-align: center;">Aun no Registrado.</td>
									@endif
									@if($secretaria->telefono != "")
										<td style="text-align: center;">{{$secretaria->telefono}}</td>
									@else
										<td style="text-align: center;">Aun no Registrado.</td>
									@endif
									<td style="text-align: center;">
										<a href="Editar-Secretaria/{{ $secretaria->id}}" >
											<button class=" btn btn-success btn-sm fa fa-pencil-square-o"></button>
										</a>
										<button type="" class="btn btn-danger btn-sm  EliminarSecretaria fa fa-trash-o "  Sid="{{$secretaria->id}}" ></button>
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