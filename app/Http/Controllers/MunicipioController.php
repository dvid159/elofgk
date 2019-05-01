<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Municipio;
use Illuminate\Support\Facades\Session;

class MunicipioController extends Controller
{
    public function index()
    {
        $data = DB::select('SELECT m.id_municipio, m.id_departamento, m.municipio, d.departamento FROM municipio m JOIN departamento d ON (d.id_departamento = m.id_departamento) ORDER BY d.departamento');

        $depart = DB::table('departamento')->get();
        return view('admin.municipio',compact('data','depart'));
    }

    public function store(Request $request)
    {

       $municipio = new Municipio(array(
        'id_departamento' => $request->get('id_departamento'),
        'municipio' => $request->get('municipio')
       ));
       $municipio->save();
	   //return redirect('/municipios');
    }

    public function show($id)
    {
        $departamento = Municipio::where('id_municipio',$id)->get();
        return response()->json($departamento->toArray());
    }

    public function update ($id, Request $request)
    {
        Municipio::where('id_municipio',$id)->update([
            'municipio' => $request->get('municipio'),
            'id_departamento' => $request->get('id_departamento')]);
        //return redirect('/departamentos');
    }

    public function destroy ($id)
    {
        Municipio::where('id_municipio',$id)->delete();
        //return redirect('/municipios');
    }
}
