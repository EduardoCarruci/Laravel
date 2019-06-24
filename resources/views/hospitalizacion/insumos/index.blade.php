@extends('layouts.app')


@section('title','Personal')


@section ('content')

 <div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Listado de Insumos <a href="insumos/create"><button class="btn btn-success">Nuevo</button></a></h3>
	 @include('hospitalizacion.insumos.search') 
		
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					<th>ID</th>
					<th>Nombre</th>
					<th>Descripcion</th>
					<th>Fabricante</th>
					<th>Fecha Vencimiento</th>
                    
				</thead>
               @foreach ($insumos as $insumo)
				<tr>
					<td>{{ $insumo->idinsumos}}</td>
					<td>{{ $insumo->nombre}}</td>
					<td>{{ $insumo->descripcion}}</td>
					<td>{{ $insumo->fabricante}}</td>
					<td>{{ $insumo->fechavencimiento}}</td>
                    					
					<td>
                        <a href="{{URL::action('InsumosController@edit',$insumo->idinsumos)}}"><button class="btn btn-info">Editar</button></a>
					 	@include('hospitalizacion.insumos.modal') 
                    </td>
                   
				</tr>
			
				@endforeach
			</table>
		</div>
		
	</div>
</div>
@endsection
