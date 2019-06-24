@extends('layouts.app')


@section('title','Cliente create')


@section ('content')
	@include('common.errors')

	


{!!	  Form::open(['route' => 'clientes.store', 'method'=> 'POST', 'files'=> true]) 		!!}
	<!–crear campo de texto FORMULARIO CON LARAVEL COLLECTIVE –>

	<!–LLAMAR AL SUB-FORMULARIO form.blade.php –>

	@include('clientes.form')

	
	{!! Form::submit('Guardar', ['class'=> 'btn btn-primary']) !!}


	{!!Form::close()!!}

 
 	<!– FORMULARIO CON html–>
<!--
 	<form class="form-group" method="POST"   action="/clientes" enctype="multipart/form-data"> 
 			@csrf
 			<div class="form-group">
				<label for="">Nombre</label>
				<input type="text" name="name" class="form-control">
			</div>

			<div class="form-group">
				<label for="">Avatar</label>
				<input type="file" name="avatar">
			</div>
			
			
			<button type="submit" class="btn btn-primary">Guardar</button>
 		</form>*/
-->
			
@endsection



