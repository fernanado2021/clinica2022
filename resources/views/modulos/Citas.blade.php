@extends('plantilla')
@section('content')
	<div class="content-wrapper">
		<section class="content-header">
			@if($doctor->sexo == "Femenino")
				<h3 style="font-family:algeria">Doctora: {{$doctor->name}}</h3>
			@else
				<h3 style="font-family:algeria">Doctor: {{$doctor->name}}</h3>
			@endif
			<h3 style="font-family:algeria">Horarios</h3>
				@if($horarios == null)
					@if(auth()->user()->rol == "Doctor")
						<form method="post" action="{{url('Horario')}}" >
						@csrf
							<div class="row">
								<div class="col-md-1">
									Desde: <input type="time" class="form-control" name="horaInicio">
								</div>
								<div class="col-md-1">
									Hasta: <input type="time" class="form-control" name="horaFin">
								</div>
								<br>
								<div class="col-md-1">
									<button type="submit" class="btn btn-success btn-lg fa fa-floppy-o">  Guardar</button>
								</div>
							</div>
						</form>
					@endif
				@else
					@foreach($horarios as $hora)
						@if(auth()->user()->rol == "Doctor")
							<form method="post" action="{{url('editar-horario/'.$hora->id)}}">
							@csrf
							@method('put')
								<div class="row">
									<div class="col-md-1">
										Desde: <input type="time" class="form-control" name="horaInicioE" value="{{$hora->horaInicio}}">
									</div>
									<div class="col-md-1">
										Hasta: <input type="time" class="form-control" name="horaFinE" value="{{$hora->horaFin}}">
									</div>
									<br>
									<div class="col-md-1">
										<button type="submit" class="btn btn-success btn-lg fa fa-floppy-o">  Editar</button>
									</div>
								</div>
							</form>
						@elseif(auth()->user()->rol == "Paciente")
							<h3>{{$hora->horaInicio}} - {{$hora->horaFin}} </h3>
						@endif
					@endforeach
				@endif
		</section>

		<section class="content">
			<div class="box">
				<div class="box-body">
					<div id="calendario"></div>
				</div>
			</div>
		</section>
	</div>

<div class="modal fade" id="CitaModal">
	<div class="modal-dialog">
		<div class="modal-content">
			<form method="post">
			@csrf
				<div class="modal-body">
					<div class="box-body">
						<div class="form-group">
							<h4>Seleccionar Paciente</h4>
							<input type="hidden" name="id_doctor" value="{{ auth()->user()->id}}">
							<select  required="" name="id_paciente" id="select2" style="width: 100%;">
								<option value="">Paciente...</option>
								@foreach($pacientes as $paciente)
									@if($paciente->rol == "Paciente")
										<option value="{{$paciente->id}}">{{$paciente->name}} - {{$paciente->documento}}</option>
									@endif
								@endforeach
							</select>
						</div>
						<div class="form-group">
							<h4>Fecha</h4>
							<input type="text" class="form-control" id="Fecha" readonly="">
						</div>
						<div class="form-group">
							<h4>Hora</h4>
							<input type="text" class="form-control" id="Hora" readonly="">
							<input type="hidden" name="FyHinicio" class="form-control" id="FyHinicio" readonly="">
							<input type="hidden" name="FyHfinal" class="form-control" id="FyHfinal" readonly="">
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="submit" class="btn btn-primary">Pedir Cita</button>
					<button type="button" class="btn btn-danger" data-dismiss="modal">Cancear</button>
				</div>
			</form>
		</div>
	</div>
</div>

<div class="modal fade" id="EventModal">
	<div class="modal-dialog">
		<div class="modal-content">
			<form method="post" action="{{url('borrar-cita')}}">
			@csrf
			@method('delete')
				<div class="modal-body">
					<div class="form-group">
						<h4>Paciente:</h4>
						<h4 id="paciente"></h4>
						<input type="hidden" name="idCita" id="idCita">
							<?php
 								 $exp = explode("/", $_SERVER["REQUEST_URI"]);
 								 echo '<input type="hidden" name="idDoctor" value="'.$exp[4].'">' ;
							?>
					</div>
				</div>
				<div class="modal-footer">
					<button type="submit" class="btn btn-warning">Cancelar Citas</button>
					<button type="button" data-dismiss="modal" class="btn btn-danger">Cerrar Cita</button>
				</div>
			</form>
		</div>
	</div>
</div>

<div class="modal fade" id="Cita">
	<div class="modal-dialog" >
		<div class="modal-content">
			<form method="post" >
			@csrf
				<div class="modal-body">
					<div class="box-body">
						<div class="form-group">
							<?php
								$exp = explode("/", $_SERVER["REQUEST_URI"]);
								echo '<input type="hidden" name="id_doctor" value=" '.$exp[4].' ">'
							?>
							<input type="hidden" name="id_paciente" value="{{auth()->user()->id}}">
						</div>
						<div class="form-group">
							<h4>Fecha:</h4>
							<input type="text" class="form-control input-md" id="FechaP" readonly="">
						</div>
						<div class="form-group">
							<h4>Hora:</h4>
							<input type="text" class="form-control input-md" id="HoraP" readonly="">
						</div>
						<div class="form-group">
							<input type="hidden" class="form-control input-md" id="FyHinicioP" name="FyHinicio" readonly="">
							<input type="hidden" class="form-control input-md" id="FyHfinalP" name="FyHfinal" readonly="">
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button class="btn btn-primary" type="submit">Pedir Cita</button>
					<button class="btn btn-danger" type="button" data-dismiss="modal">Cancelar</button>
				</div>
			</form>
		</div>
	</div>
</div>
@endsection