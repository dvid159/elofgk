<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Materia;
use Illuminate\Support\Facades\Session;

class MateriaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $data = DB::table('materia')->get();

        return view('admin.materia',compact('data'));
    }

    public function store(Request $request)
    {
       $materia = new Materia(array(
        'nombre_materia' => $request->get('materia')
        ));
       $materia->save();
    }

    public function destroy ($id)
    {
        Materia::where('id_materia',$id)->delete();
    }

    public function show($id)
    {
        $materia = Materia::where('id_materia',$id)->get();
        return response()->json($materia->toArray());
    }

    public function update ($id, Request $request)
    {
        Materia::where('id_materia',$id)->update(['nombre_materia' => $request->get('materia')]);
    }
}
