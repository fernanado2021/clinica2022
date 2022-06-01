@extends('plantilla')
@section('content')
	<div class="content-wrapper">
		<section class="content-header">
			<h1 style="font-family:algeria;" >Gestor de Consultorios</h1>
		</section>
		<section class="content">
			<div class="box">
				<br>
				<form method="post">
				@csrf
					<div class="col-md-6 col-xs-12">
						<input type="text" class="form-control" maxlength="50" minlength="2" name="consultorio" placeholder="Ingrese Nuevo Consultorio" required="" onkeypress="return soloLetras(event)">
					</div>

					<button class="btn btn-primary fa fa-plus-square" type="submit"> Agregar Consultorio</button>
				</form>
				<br>
				<div class="box-body">
					@foreach($consultorios as $consultorio)
						<div class="row">
							<form method="post" action="{{url('Consultorio/'.$consultorio->id)}}">
								@csrf
								@method('put')
									<div class="col-md-4">
										<input type="text" onkeypress="return soloLetras(event)" class="form-control" name="consultorioE" value="{{$consultorio->consultorio}}">
									</div>

									<div class="col-md-1">
										<button class="btn btn-success  fa fa-floppy-o" type="submit"> Guardar</button>
									</div>
							</form>

							<div class="col-md-1">
								<form method="post" action="{{url('borrar-Consultorio/'.$consultorio->id)}}">
									@csrf
									@method('delete')
									<button type="submit" class="btn btn-danger  fa fa-trash-o" >  Eliminar</button>
								</form>
							</div>
						</div>
						<br>
					@endforeach
				</div>
			</div>
		</section>
	</div>


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

@endsection