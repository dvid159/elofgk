<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\AlumnoSeccion;
use Illuminate\Support\Facades\Session;

class AlumnoSeccionController extends Controller
{
     
    public function index()
    {
        $anio = date("Y");

        $clases = DB::table('class')
        ->where("anho_egreso",">=",$anio)
        ->get();

        return view('admin.asignacion-alumnos',compact('clases'));
    }

    public function cargarSecciones()
    {
        
        
    }


}
