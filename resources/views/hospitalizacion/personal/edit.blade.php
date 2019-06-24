@extends('layouts.app')


@section('title','Personal create')


@section ('content')
	@include('common.errors')
    
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <h3>Editar Personal: {{$personal->nombre}} </h3>
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
                {!!Form::model($personal,['method'=> 'PATCH', 'route'=>['personal.update',$personal->cedula]]) !!}
                    {{Form::token()}}
                        <div class="class-group">
                        <label for="nombre">Nombre</label>
                        <input type="text" name="nombre" class="form-control" value="{{$personal->nombre}} " placeholder="Nombre.."> 
                        </div>

                        <div class="class-group">
                        <label for="nombre">Apellido</label>
                        <input type="text" name="apellido" class="form-control" value="{{$personal->apellido}} " placeholder="Apellido.."> 
                        </div>

                        <div class="class-group">
                            <label for="areatrabajo">Area trabajo</label>
                            <input type="text" name="areatrabajo" class="form-control" value="{{$personal->areatrabajo}} " placeholder="Area de Trabajo.."> 
                        </div>

                        <div class="form-group">
                            <button class="btn btn-primary" type="submit">Guardar</button>
                            
                        </div>


                {!!Form::close() !!}

            </div>


        </div>
  
			
@endsection


