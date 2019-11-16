<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\CentroEducativo;
use Illuminate\Support\Facades\Session;
use JavaScript;

class CentroEducativoController extends Controller
{ 
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $data = DB::table('centro_educativo')->get();
        $municipiosdb = DB::table('municipio')->select('id_municipio','municipio')->get();

        JavaScript::put([
            'municipios'=>$municipiosdb
        ]);
        
    
        return view('admin.school',compact('data','municipiosdb'));
    }


    public function store(Request $request)
    {

       $centro_educativo = new CentroEducativo(array(
        'codigo_centro_educativo' => $request->get('codigo'),
        'nombre_centro_educativo' => $request->get('nombre'),
        'direccion' => $request->get('direccion'),
        'telefono' => $request->get('telefono'),
        'id_municipio' => $request->get('idm'),
        'descripcion' => $request->get('descripcion'),
        'sector' => $request->get('sector'),
        'zona' => $request->get('zona'),
        'categoria' => $request->get('categoria')

       ));
       $centro_educativo->save();
	   //return redirect('/school');
    }

    public function show($id)
    {
        $school = CentroEducativo::where('codigo_centro_educativo',$id)->get();
        return response()->json($school->toArray());
    }

    public function update ($id, Request $request)
    {
        CentroEducativo::where('codigo_centro_educativo',$id)->update([
            'nombre_centro_educativo' => $request->get('nombre'),
            'direccion' => $request->get('direccion'),
            'telefono' => $request->get('telefono'),
            'id_municipio' => $request->get('id_municipio'),
            'descripcion' => $request->get('descripcion'),
            'sector' => $request->get('sector'),
            'zona' => $request->get('zona'),
            'categoria' => $request->get('categoria')]);
        //return redirect('/departamentos');
    }

    public function destroy ($id)
    {
        CentroEducativo::where('codigo_centro_educativo',$id)->delete();
       // return redirect('/school');
    }
}
