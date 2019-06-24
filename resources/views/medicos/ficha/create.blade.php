@extends('layouts.app')


@section('title','Ficha create')
@section ('content')
	@include('common.errors')
    
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <h3>Nueva Ficha</h3>
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
                    
                    {!!Form::open(array('url'=>'medicos/ficha','method'=>'POST','autocomplete'=>'off')) !!}
                    {{Form::token()}}

                    <div class="row">
                       
                        
                        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                            <div class="form-group">
                                <label for="codigo">Enfermedad</label>
                                <input type="text" name="enfermedad" required value="{{old('enfermedad')}}" class="form-control" placeholder="Enfermedad.."> 
                            </div>
                        </div>

                        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                            <div class="form-group">
                                <label for="tipo">Tipo</label>
                                <input type="text" name="tipo" required value="{{old('tipo')}}" class="form-control" placeholder="Tipo.."> 
                            </div>
                        </div>

                        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                            <div class="form-group">
                                <label for="diagnostico">Diagnostico</label>
                                <input type="text" name="diagnostico" required value="{{old('diagnostico')}}" class="form-control" placeholder="Diagnostico.."> 
                            </div>
                        </div>

                        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                            <div class="form-group">
                                <label for="recomendaciones">Recomendaciones</label>
                                <input type="text" name="recomendaciones" required value="{{old('recomendaciones')}}" class="form-control" placeholder="recomendaciones.."> 
                            </div>
                        </div>

                        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                            <div class="form-group">
                                <label for="intervencion">Intervencion</label>
                                <input type="text" name="intervencion" required value="{{old('intervencion')}}" class="form-control" placeholder="intervencion.."> 
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                            <div class="form-group">
                                <label for="orden">Orden</label>
                                <input type="text" name="orden" required value="{{old('orden')}}" class="form-control" placeholder="orden.."> 
                            </div>
                        </div>

                        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                        
                            <div class="form-group">
                                <label>ID CITA</label>
                                <select name="idorden" class="form-control">
                                    @foreach($cita as $c)
                                        <option value=" {{$c->idorden}}">{{$c->idorden ." ".$c->fecha ." ".$c->sintomas ." ".$c->cedula}}</option>
                                    @endforeach
                                </select>
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


