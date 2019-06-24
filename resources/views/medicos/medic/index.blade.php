@extends('layouts.app')
@section('title','Medico')
@section ('content')

 <div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Listado de Medico <a href="medic/create"><button class="btn btn-success">Nuevo</button></a></h3>
	@include('medicos.medic.search') 
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
                    <th>Licencia</th>			
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Numero</th>
                    <th>Telefono</th>
                    <th>Tipo</th>
                    <th>Especialidad</th>
                   
		
				</thead>
               @foreach ($medico as $medic)
				<tr>
                        <td>{{ $medic->licencia}}</td>				
						<td>{{ $medic->nombre}}</td>						
						<td>{{ $medic->apellido}}</td>
                        <td>{{ $medic->numero}}</td>
                        <td>{{ $medic->telefono}}</td>
                        <td>{{ $medic->tipo}}</td>
                        <td>{{ $medic->especialidad}}</td>
                      
											
					<td>
						 <a href="{{URL::action('MedicController@edit',$medic->licencia)}}"><button class="btn btn-info">Editar</button></a>	
						@include('medicos.medic.modal') 
					</td>
				
				</tr>
				
				@endforeach
			</table>
		</div>
		{{--  {{$hospital->render()}}  --}}
	</div>
</div>
@endsection

