
{!! Form::open(['method' => 'DELETE','route' => ['personal.destroy', $per->cedula],'style'=>'display:inline']) !!}
{!! Form::submit('Eliminar', ['class' => 'btn btn-danger']) !!}
{!! Form::close() !!}

