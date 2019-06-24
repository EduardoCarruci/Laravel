@extends('layouts.app')

@section('title','Hospitalizacion')

@section ('content')

 <div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Listado de Hospitalizaciones </h3>
	</div>
</div>

<div class="row">
        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                <div class="form-group">
                <label for="insumos">Codigo Insumo</label>
                 <p>{{$hospitalizacion->insumos}}</p> 
                </div>
        </div>
        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                <div class="form-group">
                <label for="nombre">Nombre Insumo</label>
                 <p>{{$hospitalizacion->nombre}}</p> 
                </div>
        </div>

        

        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
        <div class="form-group">
                <label for="nombre">Diagnostico</label>
                <p>{{$ficha_diagnostico->diagnostico}}</p> 
        </div>
        </div>

        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
        <div class="form-group">
                <label for="enfermedad">enfermedad</label>
                <p>{{$ficha_diagnostico->enfermedad}}</p> 
        </div>
        </div> 
                        
                
</div>

<div class="row">
        <div class="panel panel-primary">
            <div class="panel-body">      
              
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="table-responsive">
        <table id="detalles" class="table table-striped table-bordered table-condensed table-hover">
        <thead style="background-color: #A9D0F5">
       
        <th>Cedula</th>
        <th>Nombre</th>
        <th>Apellido</th>
      
        </thead>
        <tfoot>
      
        
        </tfoot>
        <tbody>
            @foreach ($personal_hospitalizacion as $personal)
            <tr>
             <td>{{$personal->cedula}}</td>
             <td>{{$personal->nombre}}</td>   
             <td>{{$personal->apellido}}</td>   

            </tr>    
            @endforeach
        </tbody>
        </table>
        </div>
        </div>
        </div>
        </div>
    
</div>
<div class="row">
        <div class="panel panel-primary">
            <div class="panel-body">      
              
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="table-responsive">
        <table id="detalles" class="table table-striped table-bordered table-condensed table-hover">
        <thead style="background-color: #A9D0F5">
       
        <th>Licencia</th>
        <th>Nombre</th>
        <th>Apellido</th>
      
        </thead>
        <tfoot>
      
        
        </tfoot>
        <tbody>
            @foreach ($medico_hospitalizacion as $medico)
            <tr>
             <td>{{$medico->licencia}}</td>
             <td>{{$medico->nombre}}</td>   
             <td>{{$medico->apellido}}</td>   

            </tr>    
            @endforeach
        </tbody>
        </table>
        </div>
        </div>
        </div>
        </div>
    
</div>
@endsection

