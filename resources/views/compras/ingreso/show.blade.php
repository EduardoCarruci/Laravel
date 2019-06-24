@extends('layouts.app')


@section('title','Ingreso create')


@section ('content')
	@include('common.errors')
    
     
                <div class="row">
                    <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                            <div class="form-group">
                            <label for="persona">Persona</label>
                                <p>{{$ingreso->nombre}}</p>
                            </div>
                    </div>

                    <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                            <div class="form-group">
                            <label>Tipo Comprobante</label>
                                <p>{{$ingreso->tipocomprobante}}</p>
                            </div>
                    </div>

                    <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                            <div class="form-group">
                            <label for="serie_comprobante">Serie Comprobante</label>
                            <p>{{$ingreso->serie_comprobante}}</p>
                            </div>
                    </div>                             
                        
                    <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                            <div class="form-group">
                                <label for="num_comprobante">Numero Comprobante</label>
                                <p>{{$ingreso->num_comprobante}}</p> 
                            </div>
                     </div>     

                </div>

<div class="row">
    <div class="panel panel-primary">
        <div class="panel-body">
            <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                <table id="detalles" class="table table-striped table-bordered table-condensed table-hover">
                    <thead style="background-color:cornflowerblue">
                        <th>Articulo</th>
                        <th>Cantidad</th>
                        <th>Precio Compra</th>
                        <th>Precio Venta</th>
                        
                    </thead>
                    <tfoot>
                                        
                    </tfoot>
                    <tbody>
                        @foreach($detalles as $detalle)
                        <tr>
                            <td>{{$detalle->articulo}}</td>
                            <td>{{$detalle->cantidad}}</td>
                            <td>{{$detalle->precio_compra}}</td>
                            <td>{{$detalle->precio_venta}}</td>
                            
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div> 
        </div>
    </div>

</div>          
 


  
			
@endsection


