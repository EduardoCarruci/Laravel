@extends('layouts.app')


@section('title','Categoria create')


@section ('content')
	@include('common.errors')
    
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <h3>Editar Hospitalizacion: {{$hospitalizacion->idhospitalizacion}} </h3>
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
        {!!Form::model($hospitalizacion,['method'=> 'PATCH', 'route'=>['hospital.update',$hospitalizacion->idhospitalizacion]]) !!}
        
        {{Form::token()}}
            
         <div class="row">
                        
                        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                        
                            <div class="form-group">
                                <label>Insumo</label>
                                <select name="idinsumos" class="form-control">
                                    @foreach($insumos as $insumo)
                                    {{-- @if($cat->idcategoria==$articulo->idcategoria) --}}
                                        @if($insumo->idinsumos==$hospitalizacion->idhospitalizacion)
                                        <option value=" {{$insumo->idinsumos}}" selected >{{$insumo->nombre}}</option>
                                            @else
                                            <option value=" {{$insumo->idinsumos}}" >{{$insumo->nombre}}</option>
                                        @endif
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


