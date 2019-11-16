<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use JavaScript;

class DocAlumnosxSeccionController extends Controller
{
    
    public function show($id)
    {
        //obtener periodos
        //obtener evaluaciones del periodo
        //obtener alumnos de la seccion

        //JavaScript::put([ 'materias'=>$materias ]);

        return view('docente.doc-alumnosxseccion');
    }

    


}
