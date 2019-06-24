@extends('layouts.app')


@section('title','Personal create')


@section ('content')
	@include('common.errors')
    
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <h3>Editar Medico: {{$medico->nombre}} </h3>
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
                {!!Form::model($medico,['method'=> 'PATCH', 'route'=>['medic.update',$medico->licencia]]) !!}
                    {{Form::token()}}
                        <div class="class-group">
                        <label for="nombre">Nombre</label>
                        <input type="text" name="nombre" class="form-control" value="{{$medico->nombre}} " placeholder="Nombre.."> 
                        </div>

                        <div class="class-group">
                        <label for="nombre">Apellido</label>
                        <input type="text" name="apellido" class="form-control" value="{{$medico->apellido}} " placeholder="Apellido.."> 
                        </div>

                        <div class="class-group">
                            <label for="numero">Numero</label>
                            <input type="text" name="numero" class="form-control" value="{{$medico->numero}} " placeholder="numero.."> 
                        </div>

                        <div class="class-group">
                            <label for="telefono">Telefono</label>
                            <input type="text" name="telefono" class="form-control" value="{{$medico->telefono}} " placeholder="telefono.."> 
                         </div>

                        
                          <div class="form-group">
                            <label>Tipo Comprobante</label>
                                <select name="tipo" class="form-control">                               
                                    <option value="general">General</option>
                                    <option value="especialista">Especialista</option>                                  
                                </select>
                            </div>
                        

                        <div class="class-group">
                            <label for="especialidad">Especialidad</label>
                            <input type="text" name="especialidad" class="form-control" value="{{$medico->especialidad}} " placeholder="especialidad.."> 
                        </div> 


                        <div class="form-group">
                            <button class="btn btn-primary" type="submit">Guardar</button>
                            
                        </div> 


                {!!Form::close() !!}

            </div>


        </div>
  
			
@endsection


