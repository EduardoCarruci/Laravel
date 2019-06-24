@extends('layouts.app')


@section('title','Cliente edit')


@section ('content')


{!! Form::model($cliente, ['route' => ['clientes.update' , $cliente], 'method' => 'PUT' , 'files' => true]) !!}
	<!–LLAMAR AL SUB-FORMULARIO form.blade.php –>
	@include('clientes.form')
	
<button type="submit" class="btn btn-primary">Actualizar Campos</button>

{!! Form::close() !!}

<!--
 <form class="form-group" method="POST"   action="/clientes/{{$cliente->slug}}" enctype="multipart/form-data"> 
 			@method('PUT')
 			@csrf
 			<div class="form-group">
 				<img style="height: 220px; width:220px; background-color: #EFEFEF; margin:20px; "class="card-img-top rounded-circle mx-auto d-block" src="/images/{{$cliente->avatar}}" alt="">
				<label for="">Nombre</label>
				<input type="text" name="name" value="{{$cliente->name}}" class="form-control">

			</div>

			<div class="form-group">
				<label for="">Avatar</label>
				<input type="file" name="avatar">
			</div>
			
			
			<button type="submit" class="btn btn-primary">Modificar Datos</button>
 </form>
 -->
	
			
@endsection



