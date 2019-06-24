
{!! Form::open(['method' => 'DELETE','route' => ['expediente.destroy', $expe->idexpediente],'style'=>'display:inline']) !!}
{!! Form::submit('Eliminar', ['class' => 'btn btn-danger']) !!}
{!! Form::close() !!}

