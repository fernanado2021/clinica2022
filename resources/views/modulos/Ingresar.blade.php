@extends('plantilla')
@section('contenido')
	<div class="login-box">
		<div class="login-logo">
		</div>
		<div class="login-box-body">
			<center>
				<h2 style="font-family:algeria">
					<b>Ingresar al sistema</b>
				</h2>
				<img src="https://www.zarla.com/images/zarla-rbita-med-1x1-2400x2400-20220202-kmbwfd3qkgq6k89vyh97.png?crop=1:1,smart&width=250&dpr=2" style="width: 80%;">
				<hr>
			</center>
			<form method="post" action="{{ route('login') }}">
			@csrf
				<div class="form-group has-feedback">
					<input type="email" name="email" class="form-control" required="" value="" placeholder="Ingrese su Correo">

					@error('email')
						<br><div class="alert alert-danger">Error con el Email o la Contraseña</div>
					@enderror

					<span class="glyphicon glyphicon-user form-control-feedback"></span>
				</div>

				<div class="form-group has-feedback">
					<input type="password" name="password" class="form-control" required="" value="" placeholder="Ingrese su Contraseña">
					<span class="glyphicon glyphicon-lock form-control-feedback"></span>
				</div>

				<div class="row">
					<div class="col-xs-12">
						<button type="submit" class="btn btn-primary btn-block btn-flat">Ingresar  </button>
					</div>
				</div>
			</form>
		</div>
	</div>
@endsection