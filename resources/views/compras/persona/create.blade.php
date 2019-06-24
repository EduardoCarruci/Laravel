@extends('layouts.app')


@section('title','Persona create')


@section ('content')
	@include('common.errors')
    
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <h3>Nueva Persona</h3>
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
                    
                    {!!Form::open(array('url'=>'compras/persona','method'=>'POST','autocomplete'=>'off')) !!}
                    {{Form::token()}}

                    <div class="row">
                        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                            <div class="form-group">
                            <label for="nombre">tipo_persona</label>
                            <input type="text" name="tipo_persona" required value="{{old('tipo_persona')}}" class="form-control" placeholder="Tipo_Persona.."> 
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                            <div class="form-group">
                            <label for="nombre">Nombre</label>
                            <input type="text" name="nombre" required value="{{old('nombre')}}" class="form-control" placeholder="Nombre.."> 
                         </div>
                            

                        </div>
                        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                            <div class="form-group">
                                <label for="codigo">tipo_documento</label>
                                <input type="text" name="tipo_documento" required value="{{old('tipo_documento')}}" class="form-control" placeholder="tipo_documento.."> 
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                            <div class="form-group">
                                <label for="stock">num_documento</label>
                                <input type="text" name="num_documento" required value="{{old('num_documento')}}" class="form-control" placeholder="num_documento.."> 
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                            <div class="form-group">
                                <label for="direccion">Direccion</label>
                                <input type="text" name="direccion" required value="{{old('direccion')}}" class="form-control" placeholder="direccion.."> 
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
                                <label for="email">Email</label>
                                <input type="text" name="email" required value="{{old('email')}}" class="form-control" placeholder="email.."> 
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


