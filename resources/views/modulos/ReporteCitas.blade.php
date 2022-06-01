@extends('plantilla')
@section('content')
	<div class="content-wrapper">
		<section class="content-header">
			<h1 style="font-family:algeria;">Gestor de Citas Medicas</h1>
		</section>
		<section class="content">
			<div class="box">
				<div class="box-header">
				<div class="row">
					{{-- <form action="" method="POST">
						@csrf
						<div class="col-lg-3">
							Dede: <input type="date" class=" form-control" name="desde" value={{$desde}}>
						</div>
						<div class="col-lg-3">
							Hasta: <input type="date" class=" form-control" name="hasta" value={{$hasta}}>
						</div>
						<div class="col-lg-3">
							<button class="btn btn-success btn-md" value="btn_buscar" name="btn_buscar"  style="margin-top: 5%;">Buscar</button>
						</div>
					</form> --}}
				</div>
					<a href="{{url('Descarga') }}"  target="_blank"><button class="btn btn-danger btn-lg fa fa-file-pdf-o" > Generar PDF</button></a>
				</div>
				<div class="box-body">
					<table class="table table-bordered table-hover table-striped">
						<thead>
							<tr>
								<th style="text-align: center;">Doctor</th>
								<th style="text-align: center;">Fecha y Hora</th>
								<th style="text-align: center;">Paciente</th>
							</tr>
						</thead>
						<tbody>
							@foreach($citas as $cita)
								<tr>
									@foreach($doctores as $doctor)
										@if($cita->id_doctor == $doctor->id)
											<td style="text-align: center;">{{$doctor->name}}</td>
										@endif
									@endforeach
									<td style="text-align: center;">{{$cita->FyHinicio}}</td>
									@foreach($pacientes as $paciente)
										@if($cita->id_paciente == $paciente->id)
											<td style="text-align: center;">{{$paciente->name}}</td>
										@endif
									@endforeach
								</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
		</section>
	</div>
@endsection