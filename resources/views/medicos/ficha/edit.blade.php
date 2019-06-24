@extends('layouts.app')

@section('title','Ficha edit')
@section ('content')
	@include('common.errors')
    
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <h3>Editar Ficha: {{$ficha_diagnostico->idficha_diagnostico}} </h3>
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
        {!!Form::model($ficha_diagnostico,['method'=> 'PATCH', 'route'=>['ficha.update',$ficha_diagnostico->idficha_diagnostico]]) !!}
        
        {{Form::token()}}

        <div class="row">
             
           
                

              <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                    <div class="form-group">
                        <label for="enfermedad">Enfermedad</label>
                        <input type="text" name="enfermedad" required value="{{$ficha_diagnostico->enfermedad}}" class="form-control"> 
                    </div>
                </div>
                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                    <div class="form-group">
                        <label for="tipo">Tipo</label>
                        <input type="text" name="tipo" required value="{{$ficha_diagnostico->tipo}}" class="form-control" > 
                    </div>
                </div>
                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                    <div class="form-group">
                        <label for="diagnostico">Diagnostico</label>
                        <input type="text" name="diagnostico" required value="{{$ficha_diagnostico->diagnostico}}" class="form-control"> 
                    </div>
                </div>

                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                    <div class="form-group">
                        <label for="recomendaciones">Recomendaciones</label>
                        <input type="text" name="recomendaciones" required value="{{$ficha_diagnostico->recomendaciones}}" class="form-control"> 
                    </div>
                </div>
                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                    <div class="form-group">
                        <label for="intervencion">Intervencion</label>
                        <input type="text" name="intervencion" required value="{{$ficha_diagnostico->intervencion}}" class="form-control"> 
                    </div>
                </div>
                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                    <div class="form-group">
                        <label for="orden">Orden</label>
                        <input type="text" name="orden" required value="{{$ficha_diagnostico->orden}}" class="form-control"> 
                    </div>
                </div>

               
                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                    <div class="form-group">
                        <button class="btn btn-primary" type="submit">Guardar</button>
                       {{--  <button class="btn btn-danger" type="reset">Cancelar</button> --}}
                    </div>
                </div>

                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                        
                        <div class="form-group">
                            <label>ID Orden</label>
                            <select name="idorden" class="form-control">
                                @foreach($cita as $cit)
                            
                                    @if($cit->idorden==$ficha_diagnostico->idorden)
                                    <option value=" {{$cit->idorden}}" selected >{{$cit->idorden}}</option>
                                        @else
                                        <option value=" {{$cit->idorden}}" >{{$cit->idorden}}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                </div>
        </div> 
                                
{!!Form::close() !!}			
@endsection


