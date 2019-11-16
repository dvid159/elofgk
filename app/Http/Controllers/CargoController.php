<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Cargo;
use Illuminate\Support\Facades\Session;

class CargoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $data = DB::table('cargo')->get();

        return view('admin.cargo',compact('data'));
    }

    public function store(Request $request)
    {
       $cargo = new Cargo(array(
        'cargo' => $request->get('cargo')
        ));
       $cargo->save();
    }

    public function destroy ($id)
    {
        Cargo::where('id_cargo',$id)->delete();
    }

    public function show($id)
    {
        $cargo = Cargo::where('id_cargo',$id)->get();
        return response()->json($cargo->toArray());
    }

    public function update ($id, Request $request)
    {
        Cargo::where('id_cargo',$id)->update(['cargo' => $request->get('cargo')]);
    }
}
