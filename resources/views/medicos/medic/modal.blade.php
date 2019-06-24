
{!! Form::open(['method' => 'DELETE','route' => ['medic.destroy', $medic->licencia],'style'=>'display:inline']) !!}
{!! Form::submit('Eliminar', ['class' => 'btn btn-danger']) !!}
{!! Form::close() !!}

