<?php

namespace proyecto\Http\Controllers;

use Illuminate\Http\Request;

class HospitalizacionController extends Controller
{
    /*
    public function home()
    {
        return view('hospitalizacion.index');
    }
    */
    public function index()
    {
        return view('hospitalizacion.index');
    }

    
    public function show()
    {

        return view ('hospitalizacion.insumos.index');
    }


}
