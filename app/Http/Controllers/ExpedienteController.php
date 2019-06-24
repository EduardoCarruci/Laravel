<?php

namespace proyecto\Http\Controllers;

use Illuminate\Http\Request;

//------------
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input; //subir imagenes ddell cliente al server
use proyecto\Http\Requests\ExpedienteFormRequest;
use proyecto\Expendiente;
//---------------
use DB;
//----

class ExpedienteController extends Controller
{
    public function index(Request $request){
      
        $query=trim($request->get('searchText')); 

        $expediente=DB::table('expediente as expe')
        ->join('ficha_diagnostico as ficha', 'expe.idficha_diagnostico','=','ficha.idficha_diagnostico')
        ->join('paciente as pacient', 'expe.cedula','=','pacient.cedula')
        ->select('expe.idexpediente as idexpediente',
                'expe.historial as historial',
                'expe.idficha_diagnostico as idficha_diagnostico','ficha.diagnostico as diagnostico','ficha.enfermedad as enfermedad','pacient.cedula as cedula') 
        ->where('expe.historial','LIKE','%'.$query. '%') 
        ->orderBy('expe.idexpediente', 'desc')
        ->paginate(7);
        
        return view('medicos.expediente.index',["expediente"=>$expediente,"searchText"=>$query]);
    }

     public function create(){
        $ficha_diagnostico=DB::table('ficha_diagnostico')->get(); 
        $paciente=DB::table('paciente')->get();
        return view("medicos.expediente.create",["ficha_diagnostico"=>$ficha_diagnostico,
        "paciente"=>$paciente]);
     }
     
     
    public function store(ExpedienteFormRequest $request){
        $expediente= new Expendiente();
        $expediente->historial=$request->get('historial');
        $expediente->idficha_diagnostico=$request->get('idficha_diagnostico');
        $expediente->cedula=$request->get('cedula');
        
       $expediente->save(); 
       return Redirect::to('medicos/expediente');  
    }

    
    public function edit($id){

        $expediente=Expendiente::findOrFail($id); // se selecciona ese ficha_diagnostico en especifico;
        
        $ficha_diagnostico=DB::table('ficha_diagnostico')->get(); 
        $paciente=DB::table('paciente')->get(); 

        return view("medicos.expediente.edit",["paciente"=>$paciente,
        "expediente"=>$expediente, "ficha_diagnostico"=>$ficha_diagnostico]);
    }

    public function update(ExpedienteFormRequest $request,$id){
        $expediente=Expendiente::findOrFail($id);
        $expediente->historial=$request->get('historial');    
        $expediente->idficha_diagnostico=$request->get('idficha_diagnostico');
        $expediente->cedula=$request->get('cedula');
            
      
        $expediente->update();
        return Redirect::to('medicos/expediente');
    }
   

  //YA EEDITADO
    public function destroy($id){   

        $expediente=Expendiente::findOrFail($id); 
      
       $expediente->delete(); 
        
       return Redirect::to('medicos/expediente');
   } 
}
