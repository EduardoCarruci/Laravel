
{!! Form::open(['method' => 'DELETE','route' => ['cita.destroy', $cit->idorden],'style'=>'display:inline']) !!}
{!! Form::submit('Eliminar', ['class' => 'btn btn-danger']) !!}
{!! Form::close() !!}

