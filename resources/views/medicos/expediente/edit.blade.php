@extends('layouts.app')

@section('title','Ficha edit')
@section ('content')
	@include('common.errors')
    
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <h3>Editar Ficha: {{$expediente->idexpediente}} </h3>
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
        {!!Form::model($expediente,['method'=> 'PATCH', 'route'=>['expediente.update',$expediente->idexpediente]]) !!}
        
        {{Form::token()}}

        <div class="row">

              <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                    <div class="form-group">
                        <label for="historial">Historial</label>
                        <input type="text" name="historial" required value="{{$expediente->historial}}" class="form-control"> 
                    </div>
                </div>
     
            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">                        
                        <div class="form-group">
                            <label>Ficha Diagnostico</label>
                            <select name="idficha_diagnostico" class="form-control">
                                @foreach($ficha_diagnostico as $m)                            
                                    @if($m->idficha_diagnostico==$expediente->idficha_diagnostico)
                                    <option value=" {{$m->idficha_diagnostico}}" selected >{{$m->idficha_diagnostico}}</option>
                                        @else
                                        <option value=" {{$m->idficha_diagnostico}}" >{{$m->idficha_diagnostico}}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
            </div>
            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">                        
                <div class="form-group">
                    <label>Paciente</label>
                    <select name="cedula" class="form-control">
                        @foreach($paciente as $pacient)                            
                            @if($pacient->cedula==$expediente->cedula)
                            <option value=" {{$pacient->cedula}}" selected >{{$pacient->cedula}}</option>
                                @else
                                <option value=" {{$pacient->cedula}}" >{{$pacient->cedula}}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
    </div>

                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                    <div class="form-group">
                        <button class="btn btn-primary" type="submit">Guardar</button>
            
                    </div>
                </div>

        </div> 
                                
{!!Form::close() !!}			
@endsection


