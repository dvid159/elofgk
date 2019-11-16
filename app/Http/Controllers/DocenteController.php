<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\GrupoMateria;
use JavaScript;

class DocenteController extends Controller
{   
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        return view('layout.docente');
    }

    public function show($id)
    {
        $anio = date("Y");
        $materias = GrupoMateria::join('materia','materia.id_materia','=','grupo_materia.id_materia')
        ->select('*')
        ->where('carnet_empleado',$id)
        ->where('anho',$anio)
        ->orderby('grupo_materia.id_materia')
        ->get();

        JavaScript::put([ 'materias'=>$materias ]);
        
        return view('layout.docente');
    }


}
