<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\record;
use Illuminate\Support\Facades\Session;
use Illuminate\Auth\Access\Response;

class RecordEscolarController extends Controller
{
    public function index()
    {
        // $data = DB::table('alumno')->get();
         $data = DB::select('SELECT class.anho_egreso FROM class ORDER BY(class.anho_egreso) DESC limit 3');    
         $alumnos = DB::select('SELECT a.carnet_alumno, a.nombres, a.apellidos FROM expediente_fgk.alumno a WHERE a.estado = 1');    
        return view('admin.record_escolar',compact('data', 'alumnos'));
    }

    
}