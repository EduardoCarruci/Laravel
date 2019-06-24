@extends('layouts.app')


@section('title','Persona edit')


@section ('content')
	@include('common.errors')
    
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <h3>Editar Persona: {{$persona->nombre}} </h3>
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
            </div>
        </div>           
        {!!Form::model($persona,['method'=> 'PATCH', 'route'=>['persona.update',$persona->idpersona]]) !!}
        
        {{Form::token()}}
            
        <div class="row">
                        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                            <div class="form-group">
                            <label for="nombre">tipo_persona</label>
                            <input type="text" name="tipo_persona" required value="{{$persona->tipo_persona}}" class="form-control" > 
                            </div>
                        </div>
                        
                        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                            <div class="form-group">
                                <label for="codigo">Nombre</label>
                                <input type="text" name="nombre" required value="{{$persona->nombre}}" class="form-control"> 
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                            <div class="form-group">
                                <label for="stock">Documento</label>
                                <input type="text" name="tipo_documento" required value="{{$persona->tipo_documento}}" class="form-control" > 
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                            <div class="form-group">
                                <label for="descripcion">Numero de Documento</label>
                                <input type="text" name="num_documento" required value="{{$persona->num_documento}}" class="form-control" placeholder="Descripcion.."> 
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                            <div class="form-group">
                                <label for="descripcion">Direccion</label>
                                <input type="text" name="direccion" required value="{{$persona->direccion}}" class="form-control" placeholder="Descripcion.."> 
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                            <div class="form-group">
                                <label for="descripcion">Telefono</label>
                                <input type="text" name="telefono" required value="{{$persona->telefono}}" class="form-control" placeholder="Descripcion.."> 
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                            <div class="form-group">
                                <label for="descripcion">Email</label>
                                <input type="text" name="email" required value="{{$persona->email}}" class="form-control" placeholder="Descripcion.."> 
                            </div>
                        </div>

                        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                            <div class="form-group">
                                <button class="btn btn-primary" type="submit">Guardar</button>
                                <button class="btn btn-danger" type="reset">Cancelar</button>
                            </div>
                        </div>
                    </div>


                                     


        {!!Form::close() !!}

            
  
			
@endsection


