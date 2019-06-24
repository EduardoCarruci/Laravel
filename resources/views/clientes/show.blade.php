@extends('layouts.app')


@section('title','Cliente')


@section ('content')
	@include('common.success')


	<img style="height: 220px; width:220px; background-color: #EFEFEF; margin:20px; "class="card-img-top rounded-circle mx-auto d-block" src="/images/{{$cliente->avatar}}" alt="">
	<div class="text-center">
		 <h5 class="card-title">{{$cliente->name}} </h5>
		<p class="card-text">ACA DEBERIA ESTAR UNA DESCRIPCION EN TEXTO</p>
		<a href="/clientes/{{$cliente->slug}}/edit" class="btn btn-primary">Editar</a>

	{!! Form::open(['route' => ['clientes.destroy', $cliente->slug], 'method'=> 'DELETE']) !!}
		{!! Form::submit('Eliminar',['class'=> 'btn btn-danger'])  !!}
	{!! Form::close() !!}	

	</div>
		<modal-button></modal-button>
		<create-form-pokemon></create-form-pokemon>
		<list-of-pokemons></list-of-pokemons>

	
@endsection



