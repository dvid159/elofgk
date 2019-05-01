<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Cargo;
use Illuminate\Support\Facades\Session;

class CargoController extends Controller
{
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
	   return redirect('/cargos');
    }

    public function destroy ($id)
    {
        Cargo::where('id_cargo',$id)->delete();
        return redirect('/cargos');
    }
}
