
{!! Form::open(['method' => 'DELETE','route' => ['insumos.destroy', $insumo->idinsumos],'style'=>'display:inline']) !!}
{!! Form::submit('Eliminar', ['class' => 'btn btn-danger']) !!}
{!! Form::close() !!}

