@extends('layouts.app')

@section('title','Cita')

@section ('content')

 <div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Listado de Cita <a href="cita/create"><button class="btn btn-success">Nuevo</button></a></h3>
		{{--  @include('cita.search')   --}}
		
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
                    <th>Orden</th>
					<th>Fecha</th>					
                    <th>Licencia medico</th>
                    <th>Sintomas</th>
                    <th>Cedula Paciente</th>
                    
		
				</thead>
               @foreach ($cita as $cit)
				<tr>
                        <td>{{ $cit->idorden}}</td>				
						<td>{{ $cit->fecha}}</td>						
						<td>{{ $cit->licencia}}</td>
                        <td>{{ $cit->sintomas}}</td>
                        <td>{{ $cit->cedula}}</td>
                       
											
					<td>
				 	<a href="{{URL::action('CitaController@edit',$cit->idorden)}}"><button class="btn btn-info">Editar</button></a> 
						 @include('cita.modal')
						
					</td>
				
				</tr>
				
				@endforeach
			</table>
			{!! Form::open(['method' => 'POST','route' => ['cita.show', $cit->fecha],'style'=>'display:inline']) !!}
			<div class="form-group">
				<div class="input-group">
					<input type="text" class="form-control" name="searchText" placeholder="Buscar.." value="{{$searchText}}">
						<span class="input-group-btn">
							{!! Form::submit('PDF', ['class' => 'btn btn-danger']) !!}
						</span>
				</div>
			</div>
			{{-- {!! Form::submit('Eliminar', ['class' => 'btn btn-danger']) !!} --}}
			{!! Form::close() !!}

			
			{{-- <a href="{{URL::action('CitaController@pdf',$cit->idorden)}}"><button class="btn btn-primary">PDF</button></a> --}}
		</div>
		{{--  {{$hospital->render()}}  --}}
	</div>
</div>
@endsection

