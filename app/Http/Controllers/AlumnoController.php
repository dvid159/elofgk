<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Alumno;
use Image;
use App\BitacoraCentroEscolarAlumno;

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

        //Foto
        $ruta = public_path().'/img/';
        $imagenOriginal = $request->file('Foto');
        $imagen = Image::make($imagenOriginal);
        $temp_name = $imagenOriginal->getClientOriginalExtension();
        $imagen->resize(300,300);
        $imagen->save($ruta . $temp_name, 100);


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
            'id_class'=>$request->get('clase'),
            'foto' => $temp_name
       ));
       $nuevoAlumno->save();

       //Bitacora
       $bitacora = new BitacoraCentroEscolarAlumno(array(
           'carnet_alumno' => $carnet,
           'codigo_centro_educativo' => $request->get('idce'),
           'anho'=> $anio2[1],
           'grado_cursado'=>"Noveno",
           'observaciones' => "Centro educativo de inicio."
       ));

       $bitacora->save();

    }
    public function edit($id)
    {
        $muni = DB::table('municipio')->get();
        $ce = DB::table('centro_educativo')->get();
        $class = DB::table('class')->get();
        $ocupacion = DB::table('ocupacion')->get();
        $tipoResponsable = DB::table('tipo_responsable')->get();
        $bitacora = DB::select('SELECT ce.nombre_centro_educativo, b.grado_cursado, b.anho FROM bitacora_alumno_centro_educativo b JOIN centro_educativo ce ON (b.codigo_centro_educativo = ce.codigo_centro_educativo) WHERE b.carnet_alumno=?',[$id],' ORDER BY b.id_bitacora DESC');
        $responsable = DB::select('SELECT r.dui, r.nombres, r.apellidos, r.telefono, tr.tipo_responsable, o.ocupacion FROM responsable r JOIN ocupacion o ON (o.id_ocupacion = r.id_ocupacion) JOIN tipo_responsable tr ON (tr.id_tipo_responsable=r.id_tipo_responsable) WHERE r.carnet_alumno=?',[$id]);
        $alumno = $id;
        JavaScript::put([
            'municipios'=>$muni,
            'schools'=>$ce,
        ]);
        return view('admin.alumnodetalle',compact('class','ocupacion','alumno','responsable','tipoResponsable','bitacora'));
    }

    public function show($id)
    {
        $alumno = Alumno::where('carnet_alumno',$id)->get();
        return response()->json($alumno->toArray());
    }

    public function update ($id, Request $request)
    {
        Alumno::where('carnet_alumno',$id)->update([
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
            'id_class'=>$request->get('clase'),
            //'foto' => $request->file('foto')->getClientOriginalName()
        ]);
    }
}
