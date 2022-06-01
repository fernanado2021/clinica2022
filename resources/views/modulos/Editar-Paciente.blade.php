@extends('plantilla')
@section('content')
	<div class="content-wrapper">
		<section class="content-header">
			<h1 style=" font-family:algeria;">Editar  Paciente</h1>
		</section>
		<section class="content">
			<div class="box">
				<div class="box-body">
					<form action="{{url('actualizar-paciente/'.$paciente->id)}}" method="post">
					@csrf
					@method('put')
					<div class="row">
						<div class="col-md-12">
							<div class="col-md-12">
								<h1 style="text-align:center; font-family:algeria;">Editar Paciente: {{$paciente->name}}</h1>
								<img src="https://cdn-icons-png.flaticon.com/512/104/104668.png" style="width:20%;margin-left: 40%;">
							</div>
							<div class="form-group col-md-12">
								<h4>Nombre y Apellido:</h4>
								<input type="text" name="name" maxlength="50" minlength="2"  onkeypress="return soloLetras(event)" class="form-control input-md"  value="{{$paciente->name}}"  required="">
							</div>

							<div class="form-group col-md-6">
								<h4>Email:</h4>
								<input type="email" class="form-control input-md" name="email" value="{{$paciente->email}}" required="">
								@error('email')
									<br><div class="alert alert-danger">El email ya existe.</div>
								@enderror
							</div>

							<div class="form-group col-md-6">
								<h4>Documento:</h4>
								<input type="text" maxlength="10"  onkeypress="return solonumeros(event)" name="documento" class="form-control input-md"  value="{{$paciente->documento}}"  required="">
							</div>

							<div class="form-group col-md-6">
								<h4>Telefono:</h4>
								<input type="text" maxlength="10" minlength="7" onkeypress="return solonumeros(event)" name="telefono" class="form-control input-md"  value="{{$paciente->telefono}}"  required="">
							</div>

							<div class="form-group col-md-6">
								<h4>Nueva Contraseña:</h4>
								<input type="text" name="passwordN"  minlength="8" class="form-control input-md" value="">
								<input type="hidden" name="password" class="form-control input-md" value="{{$paciente->password}}">
							</div>

							<div class="form-group col-md-6">
								<button type="submit" class="btn btn-primary btn-lg fa fa-floppy-o"> Agregar</button>
							</div>
						</div>
					</div>
					</form>
				</div>
			</div>
		</section>
	</div>

{{-- SOLO LETRAS --}}
<script>
  function soloLetras(e) {
    var key = e.keyCode || e.which,
      tecla = String.fromCharCode(key).toLowerCase(),
      letras = " áéíóúabcdefghijklmnñopqrstuvwxyz",
      especiales = [8, 37, 39, 46],
      tecla_especial = false;

    for (var i in especiales) {
      if (key == especiales[i]) {
        tecla_especial = true;
        break;
      }
    }

    if (letras.indexOf(tecla) == -1 && !tecla_especial) {
      return false;
    }
  }
</script>

{{-- SOLO NUMEROS --}}
<script>
	function solonumeros(e){
		key=e.keyCode || e.which;
		teclado=String.fromCharCode(key);
		numeros="0123456789";
		especiales="8-37-38-46";//array
		teclado_especial=false;
		for(var i in especiales){
			if (key==especiales[i]) {
				teclado_especial=true;
			}
		}
		if (numeros.indexOf(teclado)==-1 && !teclado_especial) {
			return false;
		}
	}
</script>
@endsection