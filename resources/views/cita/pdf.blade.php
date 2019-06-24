<!DOCTYPE html>
<html lang="en">
<head>
	
</head>
<body>
		<div class="row">
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<div class="table-responsive">
						<table class="table table-striped table-bordered table-condensed table-hover">
						
							<thead>
								<th>Especialidad </th>
								<th>Licencia medico</th>
								<th>Cedula Paciente</th>					
								<th>Nombre Paciente</th>
								<th>Apellido Paciente</th>
								<th>ID Orden</th>
								<th>Sintomas</th>
								<th>Cantidad de Citas: </th><td>{{ $contador}}</td>
								
									
									<br>
									<br>
									<br>
									

									<br><br><br>
									<br><br><br>
									<br><br><br>
							</thead>
							<br><br><br>
							<br><br><br>
						   @foreach ($cita as $cit)
							<tr>	<br><br><br>				
									<td>{{ $cit->especialidad}}</td>
									<td>{{ $cit->licencia}}</td>
									<td>{{ $cit->cedula}}</td>	
									<td>{{ $cit->nombre}}</td>				
									<td>{{ $cit->apellido}}</td>
									<td>{{ $cit->idorden}}</td>
									<td>{{ $cit->sintomas}}</td>
							</tr>
							
							@endforeach
						</table>
					</div>
				
				</div>
			</div>
</body>
</html>
