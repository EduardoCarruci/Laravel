@extends('layouts.app')


@section('title','Ficha create')
@section ('content')
	@include('common.errors')
    
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <h3>Nueva Cita</h3>
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
                    
                    {!!Form::open(array('url'=>'cita','method'=>'POST','autocomplete'=>'off')) !!}
                    {{Form::token()}}

                    <div class="row">
                        
                       
                        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                            <div class="form-group">
                                <label for="fecha">Fecha</label>
                                <input type="text" name="fecha" required value="{{old('fecha')}}" class="form-control" placeholder="XXXX-XX-XX"> 
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                            <div class="form-group">
                                <label for="sintomas">Sintomas</label>
                                <input type="text" name="sintomas" required value="{{old('sintomas')}}" class="form-control" placeholder="Sintomas.."> 
                            </div>
                        </div>
                        
                        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                            <div class="form-group">
                                <label>Licencia medico</label>
                                <select name="licencia" class="form-control">
                                    @foreach($medico as $m)
                                        <option value=" {{$m->licencia}}">{{$m->licencia ." " .$m->nombre . " ".$m->apellido}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                            <div class="form-group">
                                <label>Cedula Paciente</label>
                                <select name="cedula" class="form-control">
                                    @foreach($paciente as $pacien)
                                        <option value=" {{$pacien->cedula}}">{{$pacien->cedula ." " .$pacien->nombre ." ".$pacien->apellido}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                            <div class="form-group">
                                <button class="btn btn-primary" type="submit">Guardar</button>
                                {{-- <button class="btn btn-danger" type="reset">Cancelar</button> --}}
                            </div>
                        </div>
                    </div>

                {!!Form::close() !!}
			
@endsection


