<!doctype html>
<html lang="en">

<head>
    <title>Laravel</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- <style>
        table {
            font-size: 12px;
        }
    </style> -->
</head>

<body>
    <div class="container py-5">
        <h2 class=" font-weight-bold" style="font-family:Acero y Sangre; text-align: center;">ÓRBITA MED CLINICA</h2>
        <h4 class=" font-weight-bold" style="font-family:Acero y Sangre; text-align: center;">Citas Médicas</h4>
        <hr style="background: green;">
        @foreach($paciente as $paciente)
        <h5 style="font-family:Acero y Sangre;font-size: 12pt;">Cedula del Paciente: {{$paciente->documento}}</h5>
        <h5 style="font-family:Acero y Sangre;font-size: 12pt;">Nombre del Paciente: {{$paciente->name}}</h5>
	       	@foreach($citas as $cita)
	        <h5 style="font-family:Acero y Sangre;font-size: 12pt;">Cita del: {{$cita->FyHinicio}}</h5>
	        @endforeach
{{-- 	        <h5 style="font-family:Acero y Sangre;font-size: 12pt;">Consultorio:Medicina General</h5> --}}

        @endforeach
        
    </div>
</body>
</html>