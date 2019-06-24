@extends('layouts.app')
@section('title','Expediente create')
@section ('content')
	@include('common.errors')   
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <h3>New Expediente</h3>
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
                    
                    {!!Form::open(array('url'=>'medicos/expediente','method'=>'POST','autocomplete'=>'off')) !!}
                    {{Form::token()}}

                    <div class="row">
                        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                            <div class="form-group">
                            <label for="historial">Historial</label>
                            <input type="text" name="historial" required value="{{old('historial')}}" class="form-control" placeholder="historial.."> 
                            </div>
                        </div>

                        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">                        
                            <div class="form-group">
                                <label>Ficha Diagnostico</label>
                                <select name="idficha_diagnostico" class="form-control">
                                    @foreach($ficha_diagnostico as $ficha)
                                        <option value=" {{$ficha->idficha_diagnostico}}">{{$ficha->idficha_diagnostico}}  
                                             {{$ficha->enfermedad}} {{$ficha->diagnostico}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">                        
                            <div class="form-group">
                                <label>Paciente</label>
                                <select name="cedula" class="form-control">
                                    @foreach($paciente as $pacien)
                                        <option value=" {{$pacien->cedula}}">{{$pacien->cedula}}}  
                                             {{$pacien->nombre}}} {{$pacien->apellido}}}</option>
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

