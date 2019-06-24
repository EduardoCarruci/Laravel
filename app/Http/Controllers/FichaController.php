<?php

namespace proyecto\Http\Controllers;

use Illuminate\Http\Request;
//------------
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input; //subir imagenes ddell cliente al server
use proyecto\Http\Requests\Ficha_DiagnosticoFormRequest;
use proyecto\Ficha_Diagnostico;
//---------------
use DB;
//----


class FichaController extends Controller
{
    //

    public function index(Request $request){
      
        $query=trim($request->get('searchText')); 

        $ficha_diagnostico=DB::table('ficha_diagnostico as ficha')
        ->join('cita as cit', 'cit.idorden','=','ficha.idorden')
        ->select('ficha.enfermedad as enfermedad','ficha.tipo as tipo',
        'ficha.diagnostico as diagnostico','ficha.idficha_diagnostico as idficha','ficha.recomendaciones as recomendaciones'
        ,'ficha.intervencion as intervencion' ,'ficha.orden as orden','ficha.idorden as idorden') 
        ->where('ficha.enfermedad','LIKE','%'.$query. '%') 
        ->orderBy('ficha.idficha_diagnostico', 'desc')
        ->paginate(7);
        
        return view('medicos.ficha.index',["ficha_diagnostico"=>$ficha_diagnostico,"searchText"=>$query]);
    }

    public function create(){
        $cita=DB::table('cita')->get(); //dame todas las hospitalizaciones papa.
        return view("medicos.ficha.create",["cita"=>$cita]);
    }
    public function store(Ficha_DiagnosticoFormRequest $request){
        $ficha_diagnostico= new Ficha_Diagnostico();        
        $ficha_diagnostico->enfermedad=$request->get('enfermedad');
        $ficha_diagnostico->tipo=$request->get('tipo');
        $ficha_diagnostico->diagnostico=$request->get('diagnostico');
        $ficha_diagnostico->recomendaciones=$request->get('recomendaciones');
        $ficha_diagnostico->intervencion=$request->get('intervencion');
        $ficha_diagnostico->orden=$request->get('orden');
        $ficha_diagnostico->idorden=$request->get('idorden');

       $ficha_diagnostico->save(); 
       return Redirect::to('medicos/ficha');  
    }

    public function edit($id){

        $ficha_diagnostico=Ficha_Diagnostico::findOrFail($id); // se selecciona ese ficha_diagnostico en especifico;
      
        $cita=DB::table('cita')->get(); 

        return view("medicos.ficha.edit",["cita"=>$cita, "ficha_diagnostico"=>$ficha_diagnostico]);
    }

    public function update(Ficha_DiagnosticoFormRequest $request,$id){
        $ficha_diagnostico=Ficha_Diagnostico::findOrFail($id);      
       $ficha_diagnostico->enfermedad=$request->get('enfermedad');
       $ficha_diagnostico->tipo=$request->get('tipo');
       $ficha_diagnostico->diagnostico=$request->get('diagnostico');
       $ficha_diagnostico->recomendaciones=$request->get('recomendaciones');
       $ficha_diagnostico->intervencion=$request->get('intervencion');
       $ficha_diagnostico->orden=$request->get('orden');
       $ficha_diagnostico->idorden=$request->get('idorden');

        $ficha_diagnostico->update();
        return Redirect::to('medicos/ficha');
    }
   

  
    public function destroy($id){   

        $ficha_diagnostico=Ficha_Diagnostico::findOrFail($id); 
      
       $ficha_diagnostico->delete(); 
        
       return Redirect::to('medicos/ficha');
   }



}

