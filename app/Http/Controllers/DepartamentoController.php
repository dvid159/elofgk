<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Departamento;
use Illuminate\Support\Facades\Session;

class DepartamentoController extends Controller
{
    public function index()
    {
        $data = DB::table('departamento')->get();

        return view('admin.departamento',compact('data'));
    }

    public function store(Request $request)
    {

       $departamento = new Departamento(array(
        'departamento' => $request->get('departamento')
        ));
       $departamento->save();
    }

    public function destroy ($id)
    {
        Departamento::where('id_departamento',$id)->delete();
    }


    public function show($id)
    {
        $departamento = Departamento::where('id_departamento',$id)->get();
        return response()->json($departamento->toArray());
    }

    public function update ($id, Request $request)
    {
        Departamento::where('id_departamento',$id)->update(['departamento' => $request->get('departamento')]);
    }
}
