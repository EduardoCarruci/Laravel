<?php

namespace proyecto\Http\Controllers;

use Illuminate\Http\Request;

//------------
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input; //subir imagenes ddell cliente al server
use proyecto\Http\Requests\HospitalFormRequest;
use proyecto\Http\Requests\HospitalizacionFormRequest;
use proyecto\Hospital;
//---------------
use DB;
use Response;
use Illuminate\Support\Collection;
use proyecto\Hospitalizacion;
use proyecto\Insumos;
use proyecto\Personal;
use proyecto\Personal_Hospitalizacion;
use proyecto\Ficha_Diagnostico;

use proyecto\Medico;
use proyecto\Medico_Hospitalizacion;


//----

class HospitalController extends Controller
{
    public function index(Request $request){
        if($request){
        
        $query=trim($request->get('searchText')); 
        /*$hospitalizacion=DB::table('hospitalizacion as hospital')
        ->join('insumos as in', 'hospital.idinsumos','=','in.idinsumos')
        ->join('ficha_diagnostico as ficha', 'ficha.idficha_diagnostico','=','hospital.idficha_diagnostico')
        ->select('hospital.idinsumos','in.nombre as nombre' ,'hospital.idhospitalizacion as idhospitalizacion'
        ,'ficha.idficha_diagnostico as idficha_diagnostico', '' ) 
        ->where('in.nombre','LIKE','%'.$query. '%')->get();*/


        $hospitalizacion=DB::table('hospitalizacion as hospital')
        ->join('insumos as insumo', 'hospital.idinsumos','=','insumo.idinsumos')
        ->join('ficha_diagnostico as ficha', 'ficha.idficha_diagnostico','=','hospital.idficha_diagnostico')
        //->join('personal_hospitalizacion as personal', 'personal.idhospitalizacion','=','hospital.idhospitalizacion')
        ->join('medico_hospitalizacion as medico', 'medico.idhospitalizacion','=','hospital.idhospitalizacion') 
        
        ->select('hospital.idhospitalizacion as idhospitalizacion',
                'insumo.idinsumos as idinsumos',
                'hospital.idficha_diagnostico as idficha_diagnostico',
                'ficha.diagnostico as diagnostico',
                'insumo.fechavencimiento as fechavencimiento' )
        ->paginate(100);
        
            

        return view('hospitalizacion.hospital.index',["hospitalizacion"=>$hospitalizacion,"searchText"=>$query]);
        }
    }

    public function create()
    {   
        
        //consulta a la BD
        //$insumos=DB::table('insumos')->get(); //dame todas los insumos papa.
        //return view("hospitalizacion.hospital.create",["insumos"=>$insumos]); 

        // personal e insumos
        /*  
        $personas=DB::table('persona')->where('tipo_persona','=','Proovedor')->get(); // consulta si la persona es un Proovedor ( se muestran todos en un listado y se escoge cual es el proovedor )
            $articulos = DB::table('articulo as art')
            //>select(DB::raw('CONCAT(art.codigo," ",art.nombre) AS articulo'),'art.idarticulo')
            ->select('art.nombre','art.idarticulo')
            ->where('art.estado', '=', 'Activo')->get(); 
        
         return view("compras.ingreso.create",["personas"=>$personas,"articulos"=>$articulos]);*/ 

        $insumos=DB::table('insumos')->get(); 
        $personal = DB::table('personal as persona')        
            ->select('persona.cedula','persona.nombre','persona.apellido')->get();
        $medico = DB::table('medico as medic')        
            ->select('medic.licencia','medic.nombre','medic.apellido')->get();      
        $ficha_diagnostico = DB::table('ficha_diagnostico as ficha')        
            ->select('ficha.idficha_diagnostico','ficha.enfermedad as enfermedad')->get();
        
         return view("hospitalizacion.hospital.create",["personal"=>$personal,"insumos"=>$insumos,
         "ficha_diagnostico"=>$ficha_diagnostico ,"medico"=>$medico ]);
    }

    public function store(HospitalizacionFormRequest $request){
       /* $hospitalizacion= new Hospitalizacion();
        $hospitalizacion->idinsumos=$request->get('idinsumos');
            
       $hospitalizacion->save(); 
       return Redirect::to('hospitalizacion/hospital'); */

        try {
            DB::beginTransaction();
            $hospitalizacion= new Hospitalizacion();
           
            $hospitalizacion->idinsumos=$request->get('idinsumos'); 
            $hospitalizacion->idficha_diagnostico=$request->get('idficha_diagnostico');
            //NUEVO
            $hospitalizacion->fecha=$request->get('fecha');  
            
            $hospitalizacion->save();    
           
            $cedula = $request->get('cedula');
            
            //NUEVO
            $licencia = $request->get('licencia');

            $cont = 0;

            while ($cont<count($cedula)) {
           
                $personal_hospitalizacion=new Personal_Hospitalizacion();
                $personal_hospitalizacion->idhospitalizacion=$hospitalizacion->idhospitalizacion;
                $personal_hospitalizacion->cedula=$cedula[$cont];
                
          
                $personal_hospitalizacion->save();
                $cont=$cont+1;
            }
            //NUEVO
            $cont = 0;
            while ($cont<count($licencia)) {
           
                $medico_hospitalizacion=new Medico_Hospitalizacion();
                $medico_hospitalizacion->idhospitalizacion=$hospitalizacion->idhospitalizacion;
                $medico_hospitalizacion->licencia=$licencia[$cont];
                
          
                $medico_hospitalizacion->save();
                $cont=$cont+1;
            }

            DB::commit();
        } catch (Exception $e) 
        {
            DB::rollback();
        }

        return Redirect::to('hospitalizacion/hospital');
    }
   
    public function show($id){ // id q quiero mostrar
        /* $ingreso=DB::table('ingreso as ing')
        ->join('persona as per','ing.idpersona','=','per.idpersona') 
        ->join('detalle_ingreso as detall','ing.idingreso','=','detall.idingreso')
        ->select('ing.idingreso','ing.fecha_hora','per.nombre','ing.tipocomprobante'
                 ,'ing.serie_comprobante','ing.num_comprobante','ing.impuesto')
        ->where('ing.idingreso','=',$id)
        ->first();*/ 
        /*   $detalles=DB::table('detalle_ingreso as d')
        ->join('articulo as arti','d.idarticulo','=','arti.idarticulo')        
        ->select('arti.nombre as articulo','d.cantidad','d.precio_compra','d.precio_venta')
        ->where('d.idingreso' ,'=' ,$id)->get();
        */
        
        $hospitalizacion=DB::table('hospitalizacion as hospital')
        ->join('insumos as in', 'hospital.idinsumos','=','in.idinsumos') 
        ->join('personal_hospitalizacion as personal', 'personal.idhospitalizacion','=','hospital.idhospitalizacion')
        ->select('hospital.idhospitalizacion','in.idinsumos as insumos','in.nombre as nombre')
        ->where('hospital.idhospitalizacion','=',$id)->first();
        
        $personal_hospitalizacion=DB::table('personal_hospitalizacion as personal')
        ->join('personal as per','personal.cedula','=','per.cedula')        
        ->select('per.nombre as nombre','per.apellido as apellido','per.cedula as cedula')
        ->where('personal.idhospitalizacion' ,'=' ,$id)->get();

        $ficha_diagnostico=DB::table('ficha_diagnostico as ficha')
        ->join('hospitalizacion as hospital','hospital.idficha_diagnostico','=','ficha.idficha_diagnostico')        
        ->select('ficha.diagnostico as diagnostico','ficha.idficha_diagnostico as idficha_diagnostico','ficha.enfermedad as enfermedad',)
        ->where('hospital.idhospitalizacion' ,'=' ,$id)->first();

        $medico_hospitalizacion=DB::table('medico_hospitalizacion as medico')
        ->join('medico as med','medico.licencia','=','med.licencia')        
        ->select('med.nombre as nombre','med.apellido as apellido','med.licencia as licencia')
        ->where('medico.idhospitalizacion' ,'=' ,$id)->get();

    return view("hospitalizacion.hospital.show",["hospitalizacion"=>$hospitalizacion,
        "personal_hospitalizacion"=>$personal_hospitalizacion,
        "ficha_diagnostico"=>$ficha_diagnostico,
        "medico_hospitalizacion"=>$medico_hospitalizacion]);   
        
        
        //return view("hospitalizacion.hospital.show",["hospitalizacion"=>Hospitalizacion::findOrFail($id)]); 
    }
    
    /* public function edit($id){
        //ver detalles del INSUMO uy bebecitaaaaaaaaaaaaa
        
        $insumos=Insumos::findOrFail($id)->get();
        
        $hospitalizacion=DB::table('hospitalizacion')->get()->first(); //obten las hospitalizaciones;

        return view("hospitalizacion.hospital.edit",["insumos"=>$insumos, "hospitalizacion"=>$hospitalizacion]);
    }
    public function update(HospitalizacionFormRequest $request,$id){
        $hospitalizacion=Hospitalizacion::findOrFail($id);
        $hospitalizacion->idinsumos=$request->get('idinsumos');        
        $hospitalizacion->update();
        return Redirect::to('hospitalizacion/hospital');
    }

    public function destroy($id){   

        $hospitalizacion=Hospitalizacion::findOrFail($id); 
       
        $hospitalizacion->delete();
        
        return Redirect::to('hospitalizacion/hospital');
        
    } */

    public function destroy($id){   

         $personal_hospitalizacion=Personal_Hospitalizacion::findOrFail($id); 
       
        $personal_hospitalizacion->delete(); 
         
        return Redirect::to('hospitalizacion/hospital');
    }
}
