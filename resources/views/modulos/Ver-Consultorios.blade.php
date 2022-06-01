@extends('plantilla')
@section('content')
	<div class="content-wrapper">
		<section class="content-header">
			<h1 style="font-family:algeria;">Elija un Consultorio</h1>
		</section>
		<section class="content">
			<div class="box">
				<div class="box-body">
					@foreach($consultorios as $consultorio)
						<div class="col-lg-3 col-xs-6">
							<a href="Ver-Doctores/{{ $consultorio->id}}">
								<div class="small-box bg-aqua">
									<div class="inner">
										<h4  style="font-family:algeria;">{{$consultorio->consultorio}}</h4>
										<p   style="font-family:algeria;"	>{{$consultorio->consultorio}}</p>
										<br>
									</div>
									<div class="icon">
										<i class="fa fa-user-md"></i>
									</div>
								</div>
							</a>
						</div>
					@endforeach
			</div>
		</section>
	</div>
@endsection