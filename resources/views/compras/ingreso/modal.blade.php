
{!! Form::open(['method' => 'DELETE','route' => ['ingreso.destroy', $ing->idingreso],'style'=>'display:inline']) !!}
{!! Form::submit('Eliminar', ['class' => 'btn btn-danger']) !!}
{{!! Form::close() !!}}

