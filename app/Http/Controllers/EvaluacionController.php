<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EvaluacionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {

        //obtener evaluaciones de materia-class
        
        return view('docente.evaluaciones');
    }
}
