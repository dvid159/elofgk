<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Seccion;
use Illuminate\Support\Facades\Session;;

class SeccionController extends Controller
{
    public function index()
    {
        $data = DB::table('seccion')->get();
        $class = DB::table('class')->get();
        return view('admin.seccion',compact('data', 'class'));
    }

    public function store(Request $request)
    {
        $s = $request->get('seccion')."-".$request->get('class');
        $seccion = new Seccion(array(
        'id_seccion' => $s,
        'id_class' => $request->get('class'),
        'anho' => $request->get('anho'),
        'descripcion' => $request->get('descripcion')
       ));
       $seccion->save();

	   return redirect('/secciones');
    }

    public function destroy ($id)
    {
        Seccion::where('id_seccion',$id)->delete();
    }

    public function show($id)
    {
        $seccion = Seccion::where('id_seccion',$id)->get();
        return response()->json($seccion->toArray());
    }

    public function update ($id, Request $request)
    {
        Seccion::where('id_seccion',$id)->update([
            'id_class' => $request->get('class'),
            'anho' => $request->get('anho'),
            'descripcion' => $request->get('descripcion')
        ]);
    }
}
