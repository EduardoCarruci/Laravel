
{!! Form::open(['method' => 'DELETE','route' => ['hospital.destroy', $hospital->idhospitalizacion],'style'=>'display:inline']) !!}
{!! Form::submit('Eliminar', ['class' => 'btn btn-danger']) !!}
{!! Form::close() !!}

