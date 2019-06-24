@extends('layouts.app')

@section('title','Ficha Diagnostico')

@section ('content')

 <div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Listado de Fichas <a href="ficha/create"><button class="btn btn-success">Nuevo</button></a></h3>
	{{-- 	@include('compras.ingreso.search') --}}
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					<th>ID Ficha Diagnostico</th>
					<th>Enfermedad</th>
					<th>Tipo</th>
					<th>Diagnostico</th>
					<th>Recomendaciones</th>
					<th>Intervencion</th>
					<th>Orden</th>
					<th>ID orden</th>
					
		
				</thead>
               @foreach ($ficha_diagnostico as $ficha)
				<tr>
						<td>{{ $ficha->idficha}}</td>	
						<td>{{ $ficha->enfermedad}}</td>
						<td>{{ $ficha->tipo}}</td>
						<td>{{ $ficha->diagnostico}}</td>
						<td>{{ $ficha->recomendaciones}}</td>
						<td>{{ $ficha->intervencion}}</td>
						<td>{{ $ficha->orden}}</td>
						<td>{{ $ficha->idorden}}</td>

					
											
					<td>
						<a href="{{URL::action('FichaController@edit',$ficha->idficha)}}"><button class="btn btn-info">Editar</button></a>	
						@include('medicos.ficha.modal')
					</td>
				
				</tr>
				
				@endforeach
			</table>
		</div>
		{{--  {{$hospital->render()}}  --}}
	</div>
</div>
@endsection


