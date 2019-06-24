<?php

namespace proyecto\Http\Controllers;

use Illuminate\Http\Request;

//------------
use proyecto\Insumos; // agregar al proyecto el modelo
use Illuminate\Support\Facades\Redirect; // para redireciones
use proyecto\Http\Requests\InsumosFormRequest; //agregando reglas
use DB;
use SebastianBergmann\Environment\Console; //clase db de laravel

class InsumosController extends Controller
{
    public function index(Request $request){
        if($request){
            
            $query=trim($request->get('searchText')); 
            $insumos=DB::table('insumos as insu')
            ->select('insu.nombre as nombre', 'insu.fechavencimiento as fechavencimiento','insu.descripcion as descripcion','insu.fabricante as fabricante',
            'insu.idinsumos as idinsumos')      
            ->where('nombre','LIKE','%'.$query. '%')->get();
        }
    return view('hospitalizacion.insumos.index',["insumos"=>$insumos,"searchText"=>$query]);
           
    }


    public function create(){
        return view("hospitalizacion.insumos.create");
    }
    //crear en bd / almacenar el objeto
    public function store(InsumosFormRequest $request){
        $insumos= new Insumos();
        $insumos->nombre=$request->get('nombre');
        $insumos->descripcion=$request->get('descripcion');
        $insumos->fabricante=$request->get('fabricante');
        $insumos->fechavencimiento=$request->get('fechavencimiento');
        $insumos->save(); 
        return Redirect::to('hospitalizacion/insumos');  
    }
    //mostrar
    public function show($id){ 
        return view("hospitalizacion.insumos.show",["insumos"=>Insumos::findOrFail($id)]);
    }
    public function edit($id){
        return view("hospitalizacion.insumos.edit",["insumos"=>Insumos::findOrFail($id)]);
    }
  
    public function update(InsumosFormRequest $request,$id){
    $insumos=Insumos::findOrFail($id);
    $insumos->nombre=$request->get('nombre'); 
    $insumos->descripcion=$request->get('descripcion');
    $insumos->fabricante=$request->get('fabricante');
    $insumos->fechavencimiento=$request->get('fechavencimiento');   
    $insumos->update();
    return Redirect::to('hospitalizacion/insumos');
    }

    //destruir y elimiar de la bd
    public function destroy($id){  
        
        $insumos=Insumos::findOrFail($id);
      
        $insumos->delete();
        return Redirect::to('hospitalizacion/insumos');


        
    }
}    

