@extends('layouts.app')

@section('title','Ficha Diagnostico')

@section ('content')

 <div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Listado de Expedientes <a href="expediente/create"><button class="btn btn-success">Nuevo</button></a></h3>
	{{-- 	@include('compras.ingreso.search') --}}
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
                    <th>ID Expediente</th>
					<th>Historial</th>					
                    <th>ID Ficha Diagnostico</th>                   
					<th>Cedula Paciente</th>
		
				</thead>
               @foreach ($expediente as $expe)
				<tr>
                        <td>{{ $expe->idexpediente}}</td>				
						<td>{{ $expe->historial}}</td>						
						<td>{{ $expe->idficha_diagnostico}}</td>
						<td>{{ $expe->cedula}}</td>
                        
											
					<td>
						<a href="{{URL::action('ExpedienteController@edit',$expe->idexpediente)}}"><button class="btn btn-info">Editar</button></a>	
						 @include('medicos.expediente.modal') 
					</td>
				
				</tr>
				
				@endforeach
			</table>
		</div>
		{{--  {{$hospital->render()}}  --}}
	</div>
</div>
@endsection


