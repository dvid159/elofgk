<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Aptitud;
use Illuminate\Support\Facades\Session;

class AptitudController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $data = DB::select('SELECT a.id_aptitud, a.id_criterio, a.nombre_aptitud, c.nombre_criterio  FROM aptitud a JOIN criterio c ON (c.id_criterio = a.id_criterio)');
        $criterio = DB::table('criterio')->get();

        return view('admin.aptitud', compact('data', 'criterio'));
    }

    public function store(Request $request)
    {
       $aptitud = new Aptitud(array(
        'id_criterio' => $request->get('id_criterio'),
        'nombre_aptitud' => $request->get('aptitud')
        ));
       $aptitud->save();
    }

    public function destroy ($id)
    {
        Aptitud::where('id_aptitud',$id)->delete();
    }

    public function show($id)
    {
        $aptitud = Aptitud::where('id_aptitud',$id)->get();
        return response()->json($aptitud->toArray());
    }

    public function update ($id, Request $request)
    {
        Aptitud::where('id_aptitud',$id)->update([
            'id_criterio' => $request->get('id_criterio'),
            'nombre_aptitud' => $request->get('aptitud')
        ]);
    }
}
