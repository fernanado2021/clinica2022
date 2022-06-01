@extends('plantilla')
@section('content')
	<div class="content-wrapper">
		<section class="content-header">
			<h1 style="font-family:algeria;">Doctores del la Especialidad de: <b>{{$consultorio->consultorio}}</b></h1>
		</section>
		<section class="content">
			<div class="box">
				<div class="box-body">
					<table class="table table-bordered table-striped table-hover ">
						<thead>
							<tr>
								<th style="text-align:center;">Nombre y Apellido</th>
								<th style="text-align:center;">Email</th>
								<th style="text-align:center;">Telefono</th>
								<th style="text-align:center;">Horario</th>
								<th style="text-align:center;"></th>
							</tr>
						</thead>
						<tbody>

							@foreach($horarios as $hora)
								@foreach($doctores as $doctor)
									@if($hora->id_doctor ==$doctor->id)
										<tr>
											<td style="text-align:center;">{{$doctor->name}}</td>
											<td style="text-align:center;">{{$doctor->email}}</td>
											@if($doctor->telefono != "")
												<td style="text-align:center;">{{$doctor->telefono}}</td>
											@endif

												<td style="text-align:center;">{{$hora->horaInicio}} - {{$hora->horaFin}} </td>
													<td style="text-align:center">
														<a href="{{url('Citas/'.$doctor->id)}}">
															<button class="btn btn-primary btn-sm">Agenda de Citas</button>
														</a>
													</td>
												@endif
										</tr>
								@endforeach
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
		</section>
	</div>
@endsection