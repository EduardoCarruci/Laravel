@extends('layouts.app')

@section('title','Ficha edit')
@section ('content')
	@include('common.errors')
    
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <h3>Editar paciente: {{$paciente->cedula}} </h3>
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
        </div>            <!-- todos los parametros del metodo update de Categoria-->
        {!!Form::model($paciente,['method'=> 'PATCH', 'route'=>['paciente.update',$paciente->cedula]]) !!}
        
        {{Form::token()}}

        <div class="row">
                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                    <div class="form-group">
                    <label for="nombre">Nombre</label>
                    <input type="text" name="nombre" required value="{{$paciente->nombre}}" class="form-control" > 
                    </div>
                </div>

                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                    <div class="form-group">
                        <label for="apellido">Apellido</label>
                        <input type="text" name="apellido" required value="{{$paciente->apellido}}" class="form-control" > 
                    </div>
                </div>
           
                

              <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                    <div class="form-group">
                        <label for="cedula">Cedula</label>
                        <input type="text" name="cedula" required value="{{$paciente->cedula}}" class="form-control"> 
                    </div>
                </div>

                
                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                    <div class="form-group">
                        <label for="numero">Numero</label>
                        <input type="text" name="numero" required value="{{$paciente->numero}}" class="form-control"> 
                    </div>
                </div>
                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                    <div class="form-group">
                        <label for="telefono">Telefono</label>
                        <input type="text" name="telefono" required value="{{$paciente->telefono}}" class="form-control"> 
                    </div>
                </div>
                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                    <div class="form-group">
                        <label for="direccion">Direccion</label>
                        <input type="text" name="direccion" required value="{{$paciente->direccion}}" class="form-control"> 
                    </div>
                </div>

                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                    <div class="form-group">
                        <label for="edad">Edad</label>
                        <input type="text" name="edad" required value="{{$paciente->edad}}" class="form-control"> 
                    </div>
                </div>

                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                        
                    {{-- <div class="form-group">
                        <label>Expediente del Paciente</label>
                        <select name="idexpediente" class="form-control">
                            @foreach($expediente as $expe)
                        
                                @if($expe->idexpediente==$paciente->idexpediente)
                                <option value=" {{$expe->idexpediente}}" selected >{{$expe->idexpediente}}</option>
                                    @else
                                    <option value=" {{$expe->idexpediente}}" >{{$expe->idexpediente}}</option>
                                @endif
                            @endforeach
                        </select>
                    </div> --}}
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


