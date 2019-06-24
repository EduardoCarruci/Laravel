@extends('layouts.app')

@section('title','Personas')

@section ('content')

 <div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Listado de Ingresos <a href="ingreso/create"><button class="btn btn-success">Nuevo</button></a></h3>
		@include('compras.ingreso.search')
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					
					<th>Fecha</th>
					<th>Persona</th>
					<th>Tipo Comprobante</th>
					<th>Serie Comprobante</th>
					<th>Numero Comprobante</th>
					<th>Impuesto</th>
					
					<th>Estado</th>
					<th>Opciones</th>
				</thead>
               @foreach ($ingresos as $ing)
				<tr>
					
					<td>{{ $ing->fecha_hora}}</td>
					<td>{{ $ing->nombre}}</td>
					<td>{{ $ing->tipocomprobante}}</td>
					<td>{{ $ing->serie_comprobante}}</td>
					<td>{{ $ing->num_comprobante}}</td>
					<td>{{ $ing->impuesto}}</td>
				
					<td>{{ $ing->estado}}</td>						
					
					<td>
						<a href="{{URL::action('IngresoController@show',$ing->idingreso)}}"><button class="btn btn-info">Detalles</button></a>
						@include('compras.ingreso.modal')	
					</td>
				</tr>
				
				@endforeach
			</table>
		</div>
		{{$ingresos->render()}}
	</div>
</div>
@endsection



