<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\GrupoMateria;
use Illuminate\Support\Facades\Session;

class GrupoMateriaController extends Controller
{
    
    public function index()
    {
        $materiasdb = DB::table('materia')->get();
        $seccionesdb = DB::table('seccion')->get();
        $docentesdb = DB::table('empleado')->where('id_cargo', '2')->get();
        $anio = date("Y");
        $gruposdb = DB::table('grupo_materia')
        ->join('materia','grupo_materia.id_materia','=','materia.id_materia')
        ->join('empleado','grupo_materia.carnet_empleado','=','empleado.carnet_empleado')
        ->select('grupo_materia.id_grupo_materia','materia.nombre_materia','grupo_materia.id_seccion', 'empleado.nombres', 'empleado.apellidos')
        ->where('anho', $anio)->get();
        
        return view('admin.asignacion-docentes',compact('materiasdb','seccionesdb','docentesdb','gruposdb'));

    }

     
    public function store(Request $request){

        $idgrupo = $request->get('seccion')."-".$request->get('idmat');

        $nuevogrupo = new GrupoMateria(array(
            'id_grupo_materia'=>$idgrupo,
            'id_seccion'=>$request->get('seccion'),
            'id_materia'=>$request->get('materia'),
            'carnet_empleado'=>$request->get('docente'),
            'anho'=>$request->get('anio'),
            'descripcion'=>$request->get('descripcion'),
        ));

        $nuevogrupo->save();

    }

    
    public function show($id){}


    public function edit($id){}

    
    public function update(Request $request, $id){}


    public function destroy($id){}

}
