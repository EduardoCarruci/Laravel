<?php

namespace proyecto\Http\Controllers;

use Illuminate\Http\Request;

class MedicosController extends Controller
{
    public function index()
    {
        return view('medicos.index');
    }

}
