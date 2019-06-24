@extends('layouts.app')
@section('title','Hospitalizacion create')

@section ('content')
	@include('common.errors')
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <h3>Nuevo Hospitalizacion</h3>
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
     
{!!Form::open(array('url'=>'hospitalizacion/hospital','method'=>'POST','autocomplete'=>'off')) !!}
{{Form::token()}}
                <div class="row">
                    <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                            <div class="form-group">
                            <label for="persona"> Insumo</label>
                                <select name="idinsumos" id="idinsumos" class="form-control selectpicker" data-live-search="true">
                                    @foreach($insumos as $insumo)
                                        <option value="{{$insumo->idinsumos}} ">{{$insumo->nombre}}</option>
                                    @endforeach                               
                                </select>
                            </div>
                    </div>

                    <div class="class-group">
                        <label for="fecha">Fecha De Hospitalizacion</label>
                        <input type="text" name="fecha" class="form-control" placeholder="XXXX-XX-XX.."> 
                        </div>
                </div>

                <div class="row">
                        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                                <div class="form-group">
                                <label for="persona"> Ficha Diagnostico</label>
                                    <select name="idficha_diagnostico" id="idficha_diagnostico" class="form-control selectpicker" data-live-search="true">
                                        @foreach($ficha_diagnostico as $ficha)
                                            <option value="{{$ficha->idficha_diagnostico}} ">{{$ficha->idficha_diagnostico ." " .
                                            $ficha->enfermedad }}</option>
                                        @endforeach                               
                                    </select>
                                </div>
                        </div>
                    </div>

            <div class="row">                  
                <div class="container">
                    <div class="panel panel-primary">
                        <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                            <div class="form-group">
                                <label>Personal </label>
                                    <select name="cedula" id="cedula" class="form-control selectpicker" data-live-search="true">
                                        @foreach($personal as $persona)
                                            <option value="{{$persona->cedula}} ">{{$persona->cedula }}</option>
                                            
                                        @endforeach                               
                                    </select>
                            </div>
                        </div>
                        <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                            <div class="form-grop">
                            <button type="button" id="bt_add" class="btn btn-primary">Add</button>    
                            </div>     
                        </div>
                        <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                            <table id="detalles" class="table table-striped table-bordered table-condensed table-hover">
                                <thead>
                                 <th>Opciones</th>
                                 <th>Cedula</th>                                          
                                </thead>    
                                <tfoot>
                                <th></th>   
                                   
                                </tfoot>
                                <tbody>

                                </tbody>
                            </table>        
                        </div>

                    </div>
                </div>
                
               
                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12" id="guardar">
                    <div class="form-group">
                        <input name="_token" value="{{csrf_token()}}" type="hidden">  
                        <button class="btn btn-primary" type="submit">Guardar</button>
                        <button class="btn btn-danger" type="reset">Cancelar</button>
                    </div>
                </div>              
            </div>
            
            <div class="row">                  
                <div class="container">
                    <div class="panel panel-primary">
                        <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                            <div class="form-group">
                                <label>Licencia </label>
                                    <select name="licencia" id="licencia" class="form-control selectpicker" data-live-search="true">
                                        @foreach($medico as $medic)
                                            <option value="{{$medic->licencia}} ">{{$medic->licencia}}</option>
                                            
                                        @endforeach                               
                                    </select>
                            </div>
                        </div>
                        <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                            <div class="form-grop">
                            <button type="button" id="bt_add_2" class="btn btn-primary">Add</button>    
                            </div>     
                        </div>
                        <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                            <table id="detalles2" class="table table-striped table-bordered table-condensed table-hover">
                                <thead>
                                 <th>Opciones</th>
                                 <th>Licencia</th>                                          
                                </thead>    
                                <tfoot>
                                <th></th>   
                                   
                                </tfoot>
                                <tbody>

                                </tbody>
                            </table>        
                        </div>

                    </div>
                </div>
                
               
                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12" id="guardar2">
                    <div class="form-group">
                        <input name="_token" value="{{csrf_token()}}" type="hidden">  
                        {{-- <button class="btn btn-primary" type="submit">Guardar</button>
                        <button class="btn btn-danger" type="reset">Cancelar</button> --}}
                    </div>
                </div>              
            </div>
{!!Form::close() !!}

@push('scripts')

    <script>
        $(document).ready(function(){
        $('#bt_add').click(function(){
         agregar();
         });
       });
    var cont=0;    
    total=0;
    subtotal=[];
    $("#guardar").hide();
    
    
    function agregar(){
        cedula=$("#cedula option:selected").text();
    
        if(cedula!=""){
    
            var fila='<tr class="selected" id="fila'+cont+'"><td><button type="button" class="btn btn-warning" onclick="eliminar('+cont+');">X</button></td><td><input type="hidden" name="cedula[]" value="'+cedula+'">'+cedula+'</td></tr>';
            cont++;
            evaluar();
            $('#detalles').append(fila);
           
        }else{
            alert("Error");
        }
    }
    
    function evaluar()
  {
    if (cont>0)
    {
      $("#guardar").show();
    }
    else
    {
      $("#guardar").hide(); 
    }
   }
    
        function eliminar(index){
          $("#fila"+index).remove();  
          evaluar();
        }


        $(document).ready(function(){
        $('#bt_add_2').click(function(){
         agregar2();
         });
       });

        var cont2=0;    
    total2=0;
    subtotal2=[];
    $("#guardar2").hide();
    
    
    function agregar2(){
        licencia=$("#licencia option:selected").text();
    
        if(licencia!=""){
    
            var fila2='<tr class="selected" id="fila2'+cont2+'"><td><button type="button" class="btn btn-warning" onclick="eliminar2('+cont2+');">X</button></td><td><input type="hidden" name="licencia[]" value="'+licencia+'">'+licencia+'</td></tr>';
            cont2++;
            evaluar2();
            $('#detalles2').append(fila2);
           
        }else{
            alert("Error");
        }
    }
    
    function evaluar2()
  {
    if (cont2>0)
    {
      $("#guardar2").show();
    }
    else
    {
      $("#guardar2").hide(); 
    }
   }
    
        function eliminar2(index){
          $("#fila2"+index).remove();  
          evaluar2();
        }
  
    
</script>

@endpush
@endsection

<style>

.panel-primary {
     background-color: #bdc4ca;
}
</style>
