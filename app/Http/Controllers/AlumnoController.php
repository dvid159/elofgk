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
        $data = DB::select('SELECT * FROM alumno');
        return view('admin.listado-alumnos', compact('data'));
    }
    public function create()
    {
        $muni = DB::table('municipio')->get();
        $ce = DB::table('centro_educativo')->get();
        $class = DB::table('class')->get();
        $ocupacion = DB::table('ocupacion')->get();
        JavaScript::put([
            'municipios'=>$muni,
            'schools'=>$ce,
        ]);
        return view('admin.alumno',compact('class','ocupacion'));
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
    public function edit($id)
    {
        $muni = DB::table('municipio')->get();
        $ce = DB::table('centro_educativo')->get();
        $class = DB::table('class')->get();
        $ocupacion = DB::table('ocupacion')->get();
        $tipoResponsable = DB::table('tipo_responsable')->get();
        $responsable = DB::select('SELECT r.dui, r.nombres, r.apellidos, r.telefono, tr.tipo_responsable, o.ocupacion FROM responsable r JOIN ocupacion o ON (o.id_ocupacion = r.id_ocupacion) JOIN tipo_responsable tr ON (tr.id_tipo_responsable=r.id_tipo_responsable) WHERE r.carnet_alumno=?',[$id]);
        $alumno = $id;
        JavaScript::put([
            'municipios'=>$muni,
            'schools'=>$ce,
        ]);
        return view('admin.alumnodetalle',compact('class','ocupacion','alumno','responsable','tipoResponsable'));
    }
    public function show($id)
    {
        $alumno = Alumno::where('carnet_alumno',$id)->get();
        return response()->json($alumno->toArray());
    }
}
