@extends('layouts.app')


@section('title','Paciente create')
@section ('content')
	@include('common.errors')
    
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <h3>Nuevo paciente</h3>
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
                    
                    {!!Form::open(array('url'=>'medicos/paciente','method'=>'POST','autocomplete'=>'off')) !!}
                    {{Form::token()}}

                    <div class="row">
                        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                            <div class="form-group">
                            <label for="cedula">Cedula</label>
                            <input type="text" name="cedula" required value="{{old('cedula')}}" class="form-control" placeholder="cedula.."> 
                            </div>
                        </div>
                        
                        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                            <div class="form-group">
                                <label for="nombre">Nombre</label>
                                <input type="text" name="nombre" required value="{{old('nombre')}}" class="form-control" placeholder="nombre.."> 
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
                                <label for="telefono">Telefono</label>
                                <input type="text" name="telefono" required value="{{old('telefono')}}" class="form-control" placeholder="Telefono.."> 
                            </div>
                        </div>

                        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                            <div class="form-group">
                                <label for="direccion">Direccion</label>
                                <input type="text" name="direccion" required value="{{old('direccion')}}" class="form-control" placeholder="Direccion.."> 
                            </div>
                        </div>


                        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                            <div class="form-group">
                                <label for="edad">Edad</label>
                                <input type="text" name="edad" required value="{{old('edad')}}" class="form-control" placeholder="Edad.."> 
                            </div>
                        </div>

                        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                            <div class="form-group">
                                <label for="numero">Numero</label>
                                <input type="text" name="numero" required value="{{old('numero')}}" class="form-control" placeholder="Numero.."> 
                            </div>
                        </div>

                        {{-- <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">                       
                            <div class="form-group">
                                <label>ID Expediente</label>
                                <select name="idexpediente" class="form-control">
                                    @foreach($expediente as $expedient)
                                        <option value=" {{$expedient->idexpediente}}">{{$expedient->idexpediente}}</option>
                                    @endforeach
                                </select>
                            </div>

                        </div> --}}

                        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                            <div class="form-group">
                                <button class="btn btn-primary" type="submit">Guardar</button>
                                <button class="btn btn-danger" type="reset">Cancelar</button>
                            </div>
                        </div>
                    </div>

                {!!Form::close() !!}
			
@endsection


