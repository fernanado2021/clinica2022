@extends('plantilla')
@section('contenido')
<section class="content">
<div class="col-md-12">
	<center>
		<h2 style="font-family: algeria;color: green;">SELECCIONE COMO DESEA INGRESAR AL SISTEMA</h2>
		<img src="https://www.zarla.com/images/zarla-rbita-med-1x1-2400x2400-20220202-kmbwfd3qkgq6k89vyh97.png?crop=1:1,smart&width=250&dpr=2" alt="">
 	</center>
		<div class="row">
			<div class="col-lg-6 col-xs-12">
				<div class="small-box" style="background-color: #F781D8; color:white;">
					<div class="inner">
						<h3>Secretaria</h3>
						<p>Inicie Sesion</p>
					</div>
					<div class="icon">
						<i class="fa fa-female"></i>
					</div>
					<a href="Ingresar" class="small-box-footer">
						Ingresar  <i class="fa fa-arrow-circle-right"></i>
					</a>
				</div>
			</div>

			<div class="col-lg-6 col-xs-12">
				<div class="small-box" style="background-color: #BDBDBD; color:white;">
					<div class="inner">
						<h3>Doctor</h3>
						<p>Inicie Sesion</p>
					</div>
					<div class="icon">
						<i class="fa fa-user-md"></i>
					</div>
					<a href="Ingresar" class="small-box-footer">
						Ingresar  <i class="fa fa-arrow-circle-right"></i>
					</a>
				</div>
			</div>

			<div class="col-lg-6 col-xs-12">
				<div class="small-box bg-yellow">
					<div class="inner">
						<h3>Paciente</h3>
						<p>Inicie Sesion</p>
					</div>
					<div class="icon">
						<i class="fa fa-users"></i>
					</div>
					<a href="Ingresar" class="small-box-footer">
						Ingresar  <i class="fa fa-arrow-circle-right"></i>
					</a>
				</div>
			</div>

			<div class="col-lg-6 col-xs-12">
				<div class="small-box bg-red">
					<div class="inner">
						<h3>Administrador</h3>
						<p>Inicie Sesion</p>
					</div>
					<div class="icon">
						<i class="fa fa-male"></i>
					</div>
					<a href="Ingresar" class="small-box-footer">
						Ingresar  <i class="fa fa-arrow-circle-right"></i>
					</a>
				</div>
			</div>
		</div>
	</div>
</section>
@endsection