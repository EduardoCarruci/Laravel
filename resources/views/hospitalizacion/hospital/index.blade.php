@extends('layouts.app')

@section('title','Hospitalizacion')

@section ('content')

 <div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Listado de Hospitalizaciones <a href="hospital/create"><button class="btn btn-success">Nuevo</button></a></h3>
	{{-- 	@include('compras.ingreso.search') --}}
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					
					<th>ID Hospitalizacion</th>
					<th>ID Insumo</th>
					<th>ID Ficha Diagnostico</th>
					<th>Insumo Fecha Vencimiento</th>
				{{-- 	<th>ID Diagnostico</th> --}}
				
					<th>Opciones</th>
					
				</thead>
               @foreach ($hospitalizacion as $hospital)
				<tr>
						<td>{{ $hospital->idhospitalizacion}}</td>	
					 	<td>{{ $hospital->idinsumos}}</td>
						<td>{{ $hospital->idficha_diagnostico}}</td>		
						<td>{{ $hospital->fechavencimiento}}</td> 
						{{--
						{{-- <td>{{ $hospital->diagnostico}}</td>	 --}}		
					
						{{-- <td>{{ $hospital->nombre}}</td>
					 --}}
											
					<td>
					<a href="{{URL::action('HospitalController@show',$hospital->idhospitalizacion)}}">
					<button class="btn btn-info">Detalles</button></a> 
					@include('hospitalizacion.hospital.modal')
					</td>
				
				</tr>
				
				@endforeach
			</table>
		</div>
		{{--  {{$hospital->render()}}  --}}
	</div>
</div>
@endsection


