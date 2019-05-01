<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Criterio;
use Illuminate\Support\Facades\Session;

class CriterioController extends Controller
{
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
	   return redirect('/criterios');
    }

    public function destroy ($id)
    {
        Criterio::where('id_criterio',$id)->delete();
        return redirect('/criterios');
    }
}
