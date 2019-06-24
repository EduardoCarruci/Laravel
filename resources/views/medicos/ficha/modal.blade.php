
{!! Form::open(['method' => 'DELETE','route' => ['ficha.destroy', $ficha->idficha],'style'=>'display:inline']) !!}
{!! Form::submit('Eliminar', ['class' => 'btn btn-danger']) !!}
{!! Form::close() !!}

