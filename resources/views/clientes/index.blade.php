@extends('layouts.app')


@section('title','Clientes')


@section ('content')
	<div class="row">	
		@foreach($clientes as $cliente)
		
			<div class="col-sm">
				<div class="card text-center" style="width: 18rem; margin-top:70px;">
					<img style="height: 100px; width:100px; background-color: #EFEFEF; margin:20px; "class="card-img-top rounded-circle mx-auto d-block" src="images/{{$cliente->avatar}}" alt="">

				  <div class="card-body">
					    <h5 class="card-title">{{$cliente->name}} </h5>
					    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
					    <a href="/clientes/{{$cliente->slug}}" class="btn btn-primary">Ver mas</a>
				  </div>
				</div>
			</div>
		
		
		@endforeach
	</div>
@endsection



