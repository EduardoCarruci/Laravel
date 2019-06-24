@extends('layouts.app')


@section('title','Personal create')


@section ('content')
	@include('common.errors')
    
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <h3>Nueva Persona</h3>
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

                {!!Form::open(array('url'=>'hospitalizacion/personal','method'=>'POST','autocomplete'=>'off')) !!}
                    {{Form::token()}}

                        <div class="class-group">
                        <label for="nombre">Cedula</label>
                        <input type="text" name="cedula" class="form-control" placeholder="Cedula.."> 
                        </div>

                        <div class="class-group">
                        <label for="nombre">Nombre</label>
                        <input type="text" name="nombre" class="form-control" placeholder="Nombre.."> 
                        </div>

                        <div class="class-group">
                        <label for="nombre">Apellido</label>
                        <input type="text" name="apellido" class="form-control" placeholder="Apellido.."> 
                        </div>

                        <div class="class-group">
                            <label for="areatrabajo">Area de trabajo</label>
                            <input type="text" name="areatrabajo" class="form-control" placeholder="Area de Trabajo.."> 
                        </div>

                        <div class="form-group">
                            <button class="btn btn-primary" type="submit">Guardar</button>
                            <button class="btn btn-danger" type="reset">Cancelar</button>
                        </div>


                {!!Form::close() !!}

            </div>


        </div>
  
			
@endsection


