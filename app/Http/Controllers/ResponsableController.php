<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Responsable;
use App\Http\Controllers\Controller;

class ResponsableController extends Controller
{
    public function store(Request $request)
    {
       $responsable = new Responsable(array(
        'dui' => $request->get('dui'),
        'carnet_alumno' => $request->get('carnet_alumno'),
        'id_tipo_responsable' => $request->get('id_tipo_responsable'),
        'id_ocupacion' => $request->get('id_ocupacion'),
        'nombres' => $request->get('nombres'),
        'apellidos' => $request->get('apellidos'),
        'telefono' => $request->get('telefono'),
        'direccion' => $request->get('direccion'),
        'observaciones' => $request->get('observaciones')
       ));
       $responsable->save();
    }
}
