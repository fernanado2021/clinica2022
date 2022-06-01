@extends('plantilla')
@section('content')
	<div class="content-wrapper">
		<section class="content-header">
			<h1 style="font-family:algeria;">Su Historial de Citas Médicas</h1>
		</section>
		<section class="content">
			<div class="box">
				<div class="box-body">
				@foreach($citas as $cita)
						<div class="col-lg-3 col-xs-6">
								<div class="small-box bg-aqua" >
									<div class="inner">
										<h4  style="font-family:algeria; font-size: 12pt;"><b>Cita del: </b>{{$cita->FyHinicio}}</h4>
										@foreach($doctores as $doctor)
											@if($cita->id_doctor == $doctor->id)
												<h4  style="font-family:algeria; font-size: 12pt;"><b>Con:</b>{{$doctor->name}}</h4>
												@foreach($consultorios as $consultorio)
												@if($doctor->id_consultorio == $consultorio->id)
													<h4  style="font-family:algeria; font-size: 12pt;"><b>En el consultorio de:</b> {{$consultorio->consultorio}}</h4>
												@endif
											@endforeach
											@endif
										@endforeach
										<br>
									</div>
									<div class="icon">
										<i class="fa fa-medkit"></i>
									</div>
									<a href="{{url('Reporte') }}"  class="small-box-footer">
										Descargar PDF  <i class="fa fa-file-pdf-o"></i>
									</a>
								</div>
						</div>
					@endforeach
				</div>
			</div>
		</section>
	</div>
@endsection