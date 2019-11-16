<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Criterio;
use Illuminate\Support\Facades\Session;

class CriterioController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $data = DB::table('criterio')->get();

        return view('admin.criterio',compact('data'));
    }

    public function store(Request $request)
    {
       $criterio = new Criterio(array(
        'nombre_criterio' => $request->get('criterio')
        ));
       $criterio->save();
    }

    public function destroy ($id)
    {
        Criterio::where('id_criterio',$id)->delete();
    }

    public function show($id)
    {
        $criterio = Criterio::where('id_criterio',$id)->get();
        return response()->json($criterio->toArray());
    }

    public function update ($id, Request $request)
    {
        Criterio::where('id_criterio',$id)->update(['nombre_criterio' => $request->get('criterio')]);
    }
}
