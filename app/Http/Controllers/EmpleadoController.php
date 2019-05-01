<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Empleado;
use Illuminate\Support\Facades\Session;

class EmpleadoController extends Controller
{
    public function index()
    {
        $data = DB::table('empleado')->get();
        $cargo = DB::table('cargo')->get();
        $municipio = DB::table('municipio')->get();

        return view('admin.empleado',compact('data', 'cargo', 'municipio'));
    }

    public function store(Request $request)
    {

       $empleado = new Empleado(array(
        'carnet_empleado' => $request->get('carnet'),
        'id_cargo' => $request->get('cargo'),
        'dui' => $request->get('dui'),
        'nit' => $request->get('nit'),
        'nombres' => $request->get('nombre'),
        'apellidos' => $request->get('apellido'),
        'sexo' => $request->get('sexo'),
        'fecha_nacimiento' => $request->get('fecha'),
        'telefono' => $request->get('telefono'),
        'direccion' => $request->get('direccion'),
        'id_municipio' => $request->get('municipio')
        //'observaciones' => $request->get('observaciones')
        ));
       $empleado->save();
	   //return redirect('/departamentos');
    }

    public function destroy ($id)
    {
        Empleado::where('carnet_empleado',$id)->delete();
        //return redirect('/departamentos');
    }


    public function show($id)
    {
        $empleado = Empleado::where('carnet_empleado',$id)->get();
        return response()->json($empleado->toArray());
    }

    public function update ($id, Request $request)
    {
        Empleado::where('carnet_empleado',$id)->update([
            'id_cargo' => $request->get('cargo'),
            'dui' => $request->get('dui'),
            'nit' => $request->get('nit'),
            'nombres' => $request->get('nombre'),
            'apellidos' => $request->get('apellido'),
            'sexo' => $request->get('sexo'),
            'fecha_nacimiento' => $request->get('fecha'),
            'telefono' => $request->get('telefono'),
            'direccion' => $request->get('direccion'),
            'id_municipio' => $request->get('municipio'),
            'observaciones' => $request->get('observaciones')
        ]);
        //return redirect('/departamentos');
    }
}
