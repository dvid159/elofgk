<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Clase;
use Illuminate\Support\Facades\Session;

class ClassController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $data = DB::table('class')
        ->orderBy('id_class', 'desc')
        ->get();
        return view('admin.class',compact('data'));
    }

    public function store(Request $request)
    {
        $egreso = $request->get('ingreso')+2;
        // $id_class = "CLASS-".$request->get('ingreso')+2;
        $id_class = "CLASS-".$egreso;

       $class = new Clase(array(
        'id_class' => $id_class,
        'anho_ingreso' => $request->get('ingreso'),
        'anho_egreso' => $egreso,
        'descripcion' => $request->get('descripcion')
       ));
       $class->save();
	   return redirect('/admin/clases');
    }

    public function destroy ($id)
    {
        Clase::where('id_class',$id)->delete();
    }

    public function show($id)
    {
        $clase = Clase::where('id_class',$id)->get();
        return response()->json($clase->toArray());
    }

    public function update ($id, Request $request)
    {
        Clase::where('id_class',$id)->update([
            'anho_ingreso' => $request->get('ingreso'),
            'anho_egreso' => $request->get('egreso'),
            'descripcion' => $request->get('descripcion')
        ]);
    }
}
