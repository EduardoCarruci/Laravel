@extends('layouts.app')

@section('title','Personas')

@section ('content')

 <div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Listado de Personas</h3> 		
		
		@include('compras.persona.search')
	
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					<th>Id</th>
					<th>tipo_persona</th>
					<th>nombre</th>
					<th>tipo_documento</th>
					<th>num_documento</th>
					<th>direccion</th>
					<th>telefono</th>
					<th>email</th>
				</thead>
               @foreach ($personas as $per)
				<tr>
					<td>{{ $per->idpersona}}</td>
					<td>{{ $per->tipo_persona}}</td>
					<td>{{ $per->nombre}}</td>
					<td>{{ $per->tipo_documento}}</td>
					<td>{{ $per->num_documento}}</td>
					<td>{{ $per->direccion}}</td>
					<td>{{ $per->telefono}}</td>
					<td>{{ $per->email}}</td>						
					
					<td>
				
						<a href="{{URL::action('PersonaController@edit',$per->idpersona)}}"><button class="btn btn-info">Editar</button></a>
						@include('compras.persona.modal')
						
					</td>
				</tr>
				
				@endforeach
			</table>
		</div>
		{{$personas->render()}}
	</div>
</div>
@endsection



