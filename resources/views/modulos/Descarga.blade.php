<!doctype html>
<html lang="en">

<head>
    <title>Laravel</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <div class="container py-5">
    	<img src="https://www.zarla.com/images/zarla-rbita-med-1x1-2400x2400-20220202-kmbwfd3qkgq6k89vyh97.png?crop=1:1,smart&width=250&dpr=2" width="50px;" ><br><b style="font-family:Acero y Sangre; text-align: center;">ÓRBITA MED CLINICA</b><br><b style="font-family:Acero y Sangre; text-align: center;">Reporte de Citas Médicas</b>
        {{-- <h2 class=" font-weight-bold" style="font-family:Acero y Sangre; text-align: center;">ÓRBITA MED CLINICA</h2> --}}
        {{-- <h4 class=" font-weight-bold" style="font-family:Acero y Sangre; text-align: center;">Reporte de Citas Médicas</h4> --}}
        <hr style="background: green;">
	    <table class="table table-bordered table-hover table-striped">
	    	<tr>
	    		<td style="text-align: center;font-size: 8pt;">#</td>
	    		<th style="text-align: center;font-size: 8pt;">Doctor</th>
				<th style="text-align: center;font-size: 8pt;">Fecha y Hora</th>
				<th style="text-align: center;font-size: 8pt;">Paciente</th>
	    	</tr>
	    	@foreach($citas as $cita)
		    	<tr>
		    		<td style="text-align: center;font-size: 8pt">{{$loop->iteration}}</td>
		    		<td style="text-align: center;font-size: 8pt">{{$cita->doctor}}</td>
					<td style="text-align: center;font-size: 8pt">{{$cita->FyHinicio}}</td>
					<td style="text-align: center;font-size: 8pt">{{$cita->paciente}}</td>	
		    	</tr>
		    @endforeach
	    </table>
    </div>
</body>
</html>