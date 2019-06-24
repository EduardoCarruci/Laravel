@extends('layouts.app')

@section('title','Pacientes')

@section ('content')

 <div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Listado de Pacientes <a href="paciente/create"><button class="btn btn-success">Nuevo</button></a></h3>
	{{-- 	@include('compras.ingreso.search') --}}
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
                    <th>Cedula</th>
					<th>Numero</th>					
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Telefono</th>                  
                    <th>Direccion</th>
                    <th>Edad</th>
                   {{--  <th>ID Expediente</th> --}}
		
				</thead>
               @foreach ($paciente as $pacie)
				<tr>
                        <td>{{ $pacie->cedula}}</td>				
						<td>{{ $pacie->numero}}</td>						
						<td>{{ $pacie->nombre}}</td>
                        <td>{{ $pacie->apellido}}</td>
                        <td>{{ $pacie->telefono}}</td>
                        <td>{{ $pacie->direccion}}</td>
                        <td>{{ $pacie->edad}}</td>
                       {{--  <td>{{ $pacie->idexpediente}}</td> --}}
											
					<td>
						<a href="{{URL::action('PacienteController@edit',$pacie->cedula)}}"><button class="btn btn-info">Editar</button></a>
						{{-- <a href="{{route('imprimir')}}"><button class="btn btn-info">PDF</button></a> --}}
						<a href="{{URL::action('PacienteController@pdf',$pacie->cedula)}}"><button class="btn btn-primary">PDF</button></a>
						@include('medicos.paciente.modal') 
					</td>
				
				</tr>
				
				@endforeach
			</table>
		</div>
		{{--  {{$hospital->render()}}  --}}
	</div>
</div>
@endsection


