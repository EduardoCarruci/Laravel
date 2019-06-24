@extends('layouts.app')
@section('title','Medico create')
@section ('content')
	@include('common.errors')
    
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <h3>Nuevo Medico</h3>
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
                    
                    {!!Form::open(array('url'=>'medicos/medic','method'=>'POST','autocomplete'=>'off')) !!}
                    {{Form::token()}}

                    <div class="row">
                        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                            <div class="form-group">
                            <label for="nombre">Nombre</label>
                            <input type="text" name="nombre" required value="{{old('nombre')}}" class="form-control" placeholder="Nombre.."> 
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                                <div class="form-group">
                                <label for="apellido">Apellido</label>
                                <input type="text" name="apellido" required value="{{old('apellido')}}" class="form-control" placeholder="Apellido.."> 
                                </div>
                            </div>
                     
                        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                            <div class="form-group">
                                <label for="licencia">Licencia</label>
                                <input type="text" name="licencia" required value="{{old('licencia')}}" class="form-control" placeholder="Licencia.."> 
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                            <div class="form-group">
                                <label for="telefono">Telefono</label>
                                <input type="text" name="telefono" required value="{{old('telefono')}}" class="form-control" placeholder="telefono.."> 
                            </div>
                        </div>

                        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                                <div class="form-group">
                                    <label for="numero">Numero</label>
                                    <input type="text" name="numero" required value="{{old('numero')}}" class="form-control" placeholder="numero.."> 
                                </div>
                            </div>
                     

                        <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                            <div class="form-group">
                            <label>Tipo de Medico</label>
                                <select name="tipo" class="form-control">                               
                                    <option value="general">General</option>
                                    <option value="especialista">Especialista</option>                                  
                                </select>
                            </div>
                        </div>

                        <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                                <div class="form-group">
                                    <label for="especialidad">Especialidad</label>
                                    <input type="text" name="especialidad" required value="{{old('especialidad')}}" class="form-control" placeholder="especialidad.."> 
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


