<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\AlumnoSeccion;
use App\Alumno;
use App\Seccion;


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

    public function show($clase){

        $anio = date("Y");

        $alumnos = Alumno::where('id_class',$clase)->get();
        $seccionesxclase = Seccion::where('id_class',$clase)
        ->where('anho',$anio)->get();

        $alumnosxseccion = AlumnoSeccion::join('seccion','seccion.id_seccion','=','alumno_seccion.id_seccion')
        ->select('*')
        ->where('seccion.anho',$anio)->get();


        return response()->json(array(
            'alumnos' => $alumnos->toArray(),
            'seccionesxclase' => $seccionesxclase->toArray(),
            'alumnosxseccion' => $alumnosxseccion->toArray()
        ));


    }

    public function store(Request $request)
    {
       $asignacion = new AlumnoSeccion(array(
        'carnet_alumno' => $request->get('carnet'),
        'id_seccion' => $request->get('seccion'),
        'flotante' => $request->get('flotante'),
        ));
       $asignacion->save();
    }





}
