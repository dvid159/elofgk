<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\BitacoraCentroEscolarAlumno;

class BitacoraCEA extends Controller
{
    public function store(Request $request){
       //Bitacora
       $data = $request->get('clase');
       $anio = explode('-',$data);
       $grado = "";
       $verificacion = date("Y") - $anio[1];

       switch ($verificacion) {
        case 0:
            $grado = 'Noveno';
            break;
        case 1:
            $grado = 'Primero Bachillerato';
            break;
        case 2:
            $grado = 'Segundo Bachillerato';
            break;
    }


       $bitacora = new BitacoraCentroEscolarAlumno(array(
           'carnet_alumno' => $request->get('carnet_alumno'),
           'codigo_centro_educativo' => $request->get('idce'),
           'anho'=> date("Y"),
           'grado_cursado'=>$grado,
           'observaciones' => "Centro educativo de inicio."
       ));

       $bitacora->save();

    }
}
