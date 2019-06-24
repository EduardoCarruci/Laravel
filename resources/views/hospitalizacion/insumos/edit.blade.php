@extends('layouts.app')


@section('title','Personal create')


@section ('content')
	@include('common.errors')
    
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <h3>Editar Insumo: {{$insumos->nombre}} </h3>
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
                {!!Form::model($insumos,['method'=> 'PATCH', 'route'=>['insumos.update',$insumos->idinsumos]]) !!}
                    {{Form::token()}}
                        <div class="class-group">
                        <label for="nombre">Nombre</label>
                        <input type="text" name="nombre" class="form-control" value="{{$insumos->nombre}} " placeholder="Nombre.."> 
                        </div>

                        <div class="class-group">
                        <label for="descripcion">Descripcion</label>
                        <input type="text" name="descripcion" class="form-control" value="{{$insumos->descripcion}} " placeholder="Descripcion.."> 
                        </div>

                        <div class="class-group">
                        <label for="fabricante">Fabricante</label>
                        <input type="text" name="fabricante" class="form-control" value="{{$insumos->fabricante}} " placeholder="Fabricante.."> 
                        </div>


                        <div class="class-group">
                        <label for="fechavencimiento">Fecha Vencimiento</label>
                        <input type="text" name="fechavencimiento" class="form-control" value="{{$insumos->fechavencimiento}} " placeholder="XXXX-XX-XX.."> 
                        </div>        
                                

                        
                        <div class="form-group">
                            <button class="btn btn-primary" type="submit">Guardar</button>
                            
                        </div>


                {!!Form::close() !!}

            </div>


        </div>
  
			
@endsection


