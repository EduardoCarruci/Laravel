@extends('layouts.app')

@section('title','Cita edit')
@section ('content')
	@include('common.errors')
    
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <h3>Editar Cita: {{$cita->fecha}} </h3>
                <h3>Editar Cita: {{$cita->idorden}} </h3>
              
                
                
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
        {!!Form::model($cita,['method'=> 'PATCH', 'route'=>['cita.update',$cita->idorden]]) !!}
        
        {{Form::token()}}

        <div class="row">
                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                    <div class="form-group">
                    <label for="fecha">Fecha</label>
                    <input type="text" name="fecha" required value="{{$cita->fecha}}" class="form-control" > 
                    </div>
                </div>
               
                           
              <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                    <div class="form-group">
                        <label for="sintomas">Sintomas</label>
                        <input type="text" name="sintomas" required value="{{$cita->sintomas}}" class="form-control"> 
                    </div>
                </div>
            

                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                        
                        <div class="form-group">
                            <label>Licencia Medico</label>
                            <select name="licencia" class="form-control">
                                @foreach($medico as $m)
                            
                                    @if($m->licencia==$cita->licencia)
                                    <option value=" {{$m->licencia}}" selected >{{$m->licencia ." ".$m->nombre ." ".$m->apellido}}</option>
                                        @else
                                        <option value=" {{$m->licencia}}" >{{$m->licencia ." ".$m->nombre ." ".$m->apellido}}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                </div>
            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                        
                    <div class="form-group">
                        <label>Cedula Paciente</label>
                        <select name="cedula" class="form-control">
                            @foreach($paciente as $pacien)
                        
                                @if($pacien->cedula==$cita->cedula)
                                <option value=" {{$pacien->cedula}}" selected >{{$pacien->cedula ." ".$pacien->nombre ." ".$pacien->apellido}}</option>
                                    @else
                                    <option value=" {{$pacien->cedula}}" >{{$pacien->cedula ." ".$pacien->nombre ." ".$pacien->apellido}}</option>
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
