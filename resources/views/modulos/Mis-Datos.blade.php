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
						<h3 style="font-family:algeria; text-align: center;">MIS DATOS</h3>
						<hr>
						<h3 style="font-family:algeria; text-align: center;">Nombre y Apellido:</h3>
						<h4 style="font-family:algeria; text-align: center;">{{auth()->user()->name}}</h4>
						<hr>
						<h3 style="font-family:algeria; text-align: center;">Email:</h3>
						<h4 style="font-family:algeria; text-align: center;">{{auth()->user()->email}}</h4>
						<hr>
						<h3 style="font-family:algeria; text-align: center;">Documento:</h3>
						<h4 style="font-family:algeria; text-align: center;">{{auth()->user()->documento}}</h4>
						<hr>
						<h3 style="font-family:algeria; text-align: center;">Telefono:</h3>
						<h4 style="font-family:algeria; text-align: center;">{{auth()->user()->telefono}}</h4>
					</div>
					<div class="col-md-6">
						<img class="user-image" src="https://www.zarla.com/images/zarla-rbita-med-1x1-2400x2400-20220202-kmbwfd3qkgq6k89vyh97.png?crop=1:1,smart&width=250&dpr=2"  class="img-responsibe">

					</div>
				</div>
				{{-- @if(auth()->user()->rol == "Administrador")
					<div class="box-footer">
						<a href="{{url('Inicio-Editar')}}">
							<button class="btn btn-success">Editar</button>
						</a>
					</div>
				@endif --}}
			</div>
		</section>
	</div>
@endsection