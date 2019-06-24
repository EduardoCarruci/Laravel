<?php

namespace proyecto\Http\Controllers;

use Illuminate\Http\Request;
use proyecto\Cliente;

use proyecto\Http\Requests\StoreClienteRequest;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    //A FILTRAR A LOS USUARIOS
    // Necesitamos obtener todos los resultados donde se almacenan en la variable $clientes
    // se debe especificar la tabla se debe importar la clase 
    //sse debe retornar la vista "view() y retornar la variable que se a creado q contiene el array
    // se debe crear una carpeta donde se tenga el formulario y la vista.
    public function index(Request $request)
    {
        //FILTRANDO POR USER
        $request->user()->authorizeRoles(['admin','user']); // pidiendo el usuario al modelo;
        $clientes = Cliente::all(); //genera un array con la informacion de la bd
        return view('clientes.index', compact('clientes')); // para el listado

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('clientes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreClienteRequest $request)
    {       

        //VALIDACIONES-----------------------------------------------------
      //  $validacion = $request->validate([
         //   'name' => 'required|max:10' ,
          //  'avatar'=> 'required|image' ,
          //  'slug'=>'required']);
          
        //---------------------------------------------------------------



        if($request->hasFile('avatar')){ // si el form del request tiene un archivo
            $file = $request->file('avatar'); // asignando al file el archivo
            $name = time().$file->getClientOriginalName();// concatenar la fecha actual al nombre original del archivo
            $file->move(public_path().'/images/',$name);
            //return $name;
        }

       // return $request; // RETORNAR TODO EL REQUEST DE TODO EL FORM

        //ALMACENANDO EL CLIENTE EN LA BD
        $cliente = new Cliente();
        $cliente->name = $request->input('name');
        $cliente->avatar = $name;
        $cliente->slug = $request->input('slug');
        $cliente->save();
        //return 'Saved';


        return redirect()->route('clientes.index');

      // return $request->all();
        //return $request->input('name'); enviar solo el atributo nombre*/

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Cliente $cliente)
    {
       // UN CLIENTE EN ESPECIFICO

         //$cliente = Cliente::find($id); // buscando al cliente con esa ID;
         //return $cliente;
         //return view ('clientes.show',compact('cliente'));



        // ULTIMA SENTENCIA USADA
       // $cliente = Cliente::where('slug', '=',$slug)->firstOrFail();

        return view ('clientes.show',compact('cliente'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Cliente $cliente)
    {
        //
         return view ('clientes.edit',compact('cliente'));
       

            //---- A EDITAR EL CLIENTE 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cliente $cliente)
    {

        $cliente->fill($request->except('avatar'));
         if($request->hasFile('avatar')){
            $file = $request->file('avatar'); 
            $name = time().$file->getClientOriginalName();
            $cliente->avatar = $name;
            $file->move(public_path().'/images/',$name);
            //return $name;
        }
        // LA IMAGEN AUN NO SE BORRA
        $cliente->save();
        //return 'update';
        return redirect()->route('clientes.show', [$cliente])->with('status','Cliente actualizado');
    //return $request;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cliente $cliente)
    {
                    //acceder al paquete publico donde estara la ruta.
        $file_path = public_path().'/images/'.$cliente->avatar;
        \File::delete($file_path);

                $cliente->delete();
        return redirect()->route('clientes.index');

//                return 'deleted';

        //return $cliente;
    }
}
