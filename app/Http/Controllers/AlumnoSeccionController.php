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
        return view('admin.asignacion-alumnos');
    }


}
