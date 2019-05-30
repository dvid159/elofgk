<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Alumno;
use Illuminate\Support\Facades\Session;
use JavaScript;

class AlumnoController extends Controller
{
    
    public function index()
    {
        return view('admin.listado-alumnos');
    }

    public function create()
    {
        $muni = DB::table('municipio')->get();
        $ce = DB::table('centro_educativo')->get();
        $class = DB::table('class')->get();

        JavaScript::put([
            'municipios'=>$muni,
            'schools'=>$ce,
        ]);

        return view('admin.alumno',compact('class'));
    }

    public function store(Request $request){
        
        //2019-SA-FT-001
        $anio = $request->get('clase');
        $anio2 = explode('-',$anio);

        $query = DB::select("SELECT carnet_alumno FROM alumno WHERE carnet_alumno LIKE '$anio2[1]%'");
        $conteo = count($query)+1;

       if($conteo < 10){
        $carnet = $anio2[1]."-SA-FT-00".$conteo;
       }
       if($conteo < 100 && $conteo >= 10){
        $carnet = $anio2[1]."-SA-FT-0".$conteo;
       }

       $nuevoAlumno = new Alumno(array(

            'carnet_alumno'=>$carnet,
            'nombres'=>$request->get('nombres'),
            'apellidos'=>$request->get('apellidos'),
            'sexo'=>$request->get('sexo'),
            'fecha_nacimiento'=>$request->get('fecha'),
            'telefono'=>$request->get('tel'),
            'direccion'=>$request->get('direccion'),
            'email'=>$request->get('email'),
            'id_municipio'=>$request->get('idm'),
            'codigo_centro_educativo'=>$request->get('idce'),
            'turno_educativo'=>$request->get('turno'),
            'estado'=>$request->get('estado'),
            'id_class'=>$request->get('clase')

       ));

       $nuevoAlumno->save();
        
    }




 


}
