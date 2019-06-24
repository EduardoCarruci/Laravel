@extends('layouts.app')


@section('title','Personal')


@section ('content')

 <div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Listado de Personal <a href="personal/create"><button class="btn btn-success">Nuevo</button></a></h3>
		@include('hospitalizacion.personal.search')
		
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					<th>Id</th>
                    <th>Nombre</th>
					<th>Apellido</th>
					<th>Area Trabajo</th>					
					<th>Opciones</th>
				</thead>
               @foreach ($personal as $per)
				<tr>
					<td>{{ $per->cedula}}</td>
                    <td>{{ $per->nombre}}</td>
					<td>{{ $per->apellido}}</td>
					<td>{{ $per->areatrabajo}}</td>
					
					<td>
                        <a href="{{URL::action('PersonalController@edit',$per->cedula)}}"><button class="btn btn-info">Editar</button></a>
						@include('hospitalizacion.personal.modal')
                    </td>
                   
				</tr>
			
				@endforeach
			</table>
		</div>
		
	</div>
</div>
@endsection
