<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use app\GrupoMateria;
class GrupoMateriaController extends Controller
{
    
    public function index()
    {
        $materiasdb = DB::table('materia')->get();
        $seccionesdb = DB::table('seccion')->get();
        $docentesdb = DB::table('empleado')->where('id_cargo', '2')->get();
        
        return view('admin.asignacion-docentes',compact('materiasdb','seccionesdb','docentesdb'));

    }

    
    public function store(Request $request){

        $nuevogrupo = new GrupoMateria(array(
            
        ));


    }

    
    public function show($id){}


    public function edit($id){}

    
    public function update(Request $request, $id){}


    public function destroy($id){}

}
