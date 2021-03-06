@extends('layouts.app')


@section('title','Categoria create')


@section ('content')
	@include('common.errors')
    
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <h3>Editar Categoria: {{$categoria->nombre}} </h3>
                @if(count($errors)>0)
                    <div class="alert alert-danger">
                        <ul>
                        @foreach($errors->all() as $error)
                            <li>
                            {{$error}}
                            </li>
                        @endforeach    
                        </ul>
                    </div>
                @endif
                        <!-- todos los parametros del metodo update de Categoria-->
                {!!Form::model($categoria,['method'=> 'PATCH', 'route'=>['categoria.update',$categoria->idcategoria]]) !!}
                    {{Form::token()}}
                        <div class="class-group">
                        <label for="nombre">Nombre</label>
                        <input type="text" name="nombre" class="form-control" value="{{$categoria->nombre}} " placeholder="Nombre.."> 
                        </div>

                        <div class="class-group">
                        <label for="nombre">Descripcion</label>
                        <input type="text" name="descripcion" class="form-control" value="{{$categoria->descripcion}} " placeholder="Helouda.."> 
                        </div>

                        <div class="form-group">
                            <button class="btn btn-primary" type="submit">Guardar</button>
                            <button class="btn btn-danger" type="reset">Cancelar</button>
                        </div>


                {!!Form::close() !!}

            </div>


        </div>
  
			
@endsection


