@extends('layouts.app')


@section('title','Ingreso create')


@section ('content')
	@include('common.errors')
    
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <h3>Nuevo Ingreso</h3>
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
     
{!!Form::open(array('url'=>'compras/ingreso','method'=>'POST','autocomplete'=>'off')) !!}
{{Form::token()}}

                <div class="row">
                    <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                            <div class="form-group">
                            <label for="persona">Persona</label>
                                <select name="idpersona" id="idpersona" class="form-control selectpicker" data-live-search="true">
                                    @foreach($personas as $persona)
                                        <option value="{{$persona->idpersona}} ">{{$persona->nombre}}</option>
                                    @endforeach                               
                                </select>
                            </div>
                    </div>

                    <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                            <div class="form-group">
                            <label>Tipo Comprobante</label>
                                <select name="tipocomprobante" class="form-control">                               
                                    <option value="Boleta">Boleta</option>
                                    <option value="Factura">Factura</option>
                                    <option value="Ticket">Ticket</option>
                                </select>
                            </div>
                    </div>

                    <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                            <div class="form-group">
                            <label for="serie_comprobante">Serie Comprobante</label>
                            <input type="text" name="serie_comprobante" required value="{{old('serie_comprobante')}}" class="form-control" placeholder="S. Comprobante"> 
                            </div>
                    </div>                             
                        
                    <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                            <div class="form-group">
                                <label for="num_comprobante">Numero Comprobante</label>
                                <input type="text" name="num_comprobante" required value="{{old('num_comprobante')}}" class="form-control" placeholder="N. Comprobante"> 
                            </div>
                     </div>     

                </div>

            <div class="row">                  
                <div class="container">
                    <div class="panel panel-primary">
                        <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                            <div class="form-group">
                                <label>Articulo</label>
                                    <select name="idarticulo" id="idarticulo" class="form-control selectpicker" data-live-search="true">
                                        @foreach($articulos as $articulo)
                                            <option value="{{$articulo->idarticulo}} ">{{$articulo->idarticulo  ." "."$articulo->nombre"}}</option>
                                        @endforeach                               
                                    </select>
                            </div>
                        </div>
                        <div class="col-lg-2 col-sm-2 col-md-2 col-xs-12">
                            <div class="form-group">
                                <label for="cantidad">Cantidad</label>
                                <input type="number" name="cantidad" id="cantidad" class="form-control" placeholder="cantidad">
                            </div>   
                        </div>

                        <div class="col-lg-2 col-sm-2 col-md-2 col-xs-12">
                            <div class="form-group">
                                <label for="precio_compra">Precio Compra</label>
                                <input type="number" name="precio_compra" id="precio_compra" class="form-control" placeholder="Precio Compra">
                            </div>   
                        </div>

                        <div class="col-lg-2 col-sm-2 col-md-2 col-xs-12">
                            <div class="form-group">
                                <label for="precio_venta">Precio Venta</label>
                                <input type="number" name="precio_venta" id="precio_venta" class="form-control" placeholder="Precio venta">
                            </div>   
                        </div>

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


