@if ($errors->any())
		<div class="alert-danger">
			<ul>
				@foreach( $errors->all() as $error )
				<p> {{$error}} </p>
				@endforeach
			</ul>	
		</div>
		
	@endif	