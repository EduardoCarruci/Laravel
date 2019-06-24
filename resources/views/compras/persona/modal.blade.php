
{!! Form::open(['method' => 'DELETE','route' => ['persona.destroy', $per->idpersona],'style'=>'display:inline']) !!}
{!! Form::submit('Eliminar', ['class' => 'btn btn-danger']) !!}
{{!! Form::close() !!}}

