<?php
//---basicos
namespace proyecto\Http\Controllers;
use Illuminate\Http\Request;

//--agregados

//------------
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input; //subir imagenes ddell cliente al server
use proyecto\Http\Requests\IngresoFormRequest;
use proyecto\Ingreso;           //se agregan los 2 MODELOS
use proyecto\DetalleIngreso;
//---------------
use DB;
//----
//-----------------------------------NUEVOS
use Carbon\Carbon; // para la zona horaria
use Response;
use Illuminate\Support\Collection;
//----------------------------------
//
//spuestamente este CONTROL auditara la tabla ingreso y detalle_ingreso
class IngresoController extends Controller
{
    //para los users
    public function __construct(){
  
    }

    //--- se crea el objeto para validar el request
    public function index(Request $request){
        if($request){
            $query=trim($request->get('searchText')); // texto del formulario  para filtrar en la busqueda //trim para borrar espacios
            //ingreso hace la consulta a la BD y se la coloca el sufijo ing 
            //luego se encarga de unir las tablas persona con la tabla ingreso y persona 
            // y detalleIngreso con ingreso

                //INNER JOIN
            $ingresos=DB::table('ingreso as ing')
            ->join('persona as per','ing.idpersona','=','per.idpersona') 
            ->join('detalle_ingreso as detall','ing.idingreso','=','detall.idingreso')
            ->select('ing.idingreso','ing.fecha_hora','per.nombre','ing.tipocomprobante'
                     ,'ing.serie_comprobante','ing.num_comprobante','ing.impuesto','ing.estado')
                                                                                    // ,DB::raw('sum(detall.cantidad*precio_compra)as total'))
            ->where('ing.num_comprobante','LIKE','%'.$query.'%')
            ->orderBy('ing.idingreso','desc')
            ->groupBy('ing.idingreso','ing.fecha_hora','per.nombre','ing.tipocomprobante','ing.serie_comprobante','ing.num_comprobante','ing.impuesto')  
            ->paginate(7);
            
           // return view('compras.ingreso.index',[])
           return view('compras.ingreso.index',["ingresos"=>$ingresos,"searchText"=>$query]);

        }
    }
    //dame todos los articulos activos y concatena esos nombres y codigos y selecciona el codigo                          
    //concatena el codigo con el nombre del articulo
    public function create(){
       $personas=DB::table('persona')->where('tipo_persona','=','Proovedor')->get(); // consulta si la persona es un Proovedor ( se muestran todos en un listado y se escoge cual es el proovedor )
        $articulos = DB::table('articulo as art')
            //>select(DB::raw('CONCAT(art.codigo," ",art.nombre) AS articulo'),'art.idarticulo')
            ->select('art.nombre','art.idarticulo')
            ->where('art.estado', '=', 'Activo')->get(); 
        
         return view("compras.ingreso.create",["personas"=>$personas,"articulos"=>$articulos]);
    }


    public function store(IngresoFormRequest  $request){

        try {
            DB::beginTransaction();
            $ingreso = new Ingreso;

            $ingreso->idpersona=$request->get('idpersona');
            $ingreso->tipocomprobante=$request->get('tipocomprobante');
            $ingreso->serie_comprobante=$request->get('serie_comprobante');
            $ingreso->num_comprobante=$request->get('num_comprobante');
            $mytime = Carbon::now('America/Caracas');
            $ingreso->fecha_hora=$mytime->toDateTimeString();
            $ingreso->impuesto = '19';
            $ingreso->estado = 'A';
            $ingreso->save();

            $idarticulo = $request->get('idarticulo');
            $cantidad = $request->get('cantidad');
            $precio_compra = $request->get('precio_compra');
            $precio_venta = $request->get('precio_venta');

          
                $detalle=new DetalleIngreso();
                $detalle->idingreso=$ingreso->idingreso;
                $detalle->idarticulo=$idarticulo;
                $detalle->cantidad=$cantidad;
                $detalle->precio_compra=$precio_compra;
                $detalle->precio_venta=$precio_venta;
                $detalle->save();
            

            DB::commit();
        } catch (Exception $e) 
        {
            DB::rollback();
        }

    return Redirect::to('compras/ingreso');
    }
    public function show($id){
        $ingreso=DB::table('ingreso as ing')
        ->join('persona as per','ing.idpersona','=','per.idpersona') 
        ->join('detalle_ingreso as detall','ing.idingreso','=','detall.idingreso')
        ->select('ing.idingreso','ing.fecha_hora','per.nombre','ing.tipocomprobante'
                 ,'ing.serie_comprobante','ing.num_comprobante','ing.impuesto')
        ->where('ing.idingreso','=',$id)
        ->first();

        $detalles=DB::table('detalle_ingreso as d')
        ->join('articulo as arti','d.idarticulo','=','arti.idarticulo')        
        ->select('arti.nombre as articulo','d.cantidad','d.precio_compra','d.precio_venta')
        ->where('d.idingreso' ,'=' ,$id)->get();

    return view("compras.ingreso.show",["ingreso"=>$ingreso,"detalles"=>$detalles]);    
    } 


    public function destroy($id){
        $ingreso=Ingreso::findOrFail($id);
        $ingreso->Estado='C';
        $ingreso->update();

        return Redirect::to('compras/ingreso');
    }

}
