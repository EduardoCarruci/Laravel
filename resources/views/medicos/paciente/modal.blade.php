
{!! Form::open(['method' => 'DELETE','route' => ['paciente.destroy', $pacie->cedula],'style'=>'display:inline']) !!}
{!! Form::submit('Eliminar', ['class' => 'btn btn-danger']) !!}
{!! Form::close() !!}

