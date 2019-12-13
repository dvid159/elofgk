<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\record;
use Illuminate\Support\Facades\Session;
use JavaScript;

// use Illuminate\Auth\Access\Response;

class RecordEscolarController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        // $data = DB::table('alumno')->get();
         $data = DB::select('SELECT class.id_class FROM class ORDER BY(class.id_class) DESC limit 3');    
         $alumnosN = DB::select('SELECT DISTINCT n.carnet_alumno, a.id_class, a.nombres, a.apellidos, n.id_periodo, n.id_materia, n.nota FROM notas_mined n INNER JOIN alumno a ON n.carnet_alumno = a.carnet_alumno INNER JOIN grado_mined g ON n.id_grado = g.id_grado_mined WHERE (g.grado_mined = "NOVENO") AND (a.estado = 1)  ORDER BY n.carnet_alumno, n.id_periodo, id_materia');
         $alumnosP = DB::select('SELECT DISTINCT n.carnet_alumno, a.id_class, a.nombres, a.apellidos, n.id_periodo, n.id_materia, n.nota FROM notas_mined n INNER JOIN alumno a ON n.carnet_alumno = a.carnet_alumno INNER JOIN grado_mined g ON n.id_grado = g.id_grado_mined WHERE (g.grado_mined = "PRIMER AÑO") AND (a.estado = 1) ORDER BY n.carnet_alumno, n.id_periodo, id_materia');
         $alumnosS = DB::select('SELECT DISTINCT n.carnet_alumno, a.id_class, a.nombres, a.apellidos, n.id_periodo, n.id_materia, n.nota FROM notas_mined n INNER JOIN alumno a ON n.carnet_alumno = a.carnet_alumno INNER JOIN grado_mined g ON n.id_grado = g.id_grado_mined WHERE (g.grado_mined = "SEGUNDO AÑO") AND (a.estado = 1) ORDER BY n.carnet_alumno, n.id_periodo, id_materia');
         $alumnosall = DB::select('SELECT a.carnet_alumno, a.id_class, a.nombres, a.apellidos FROM alumno a WHERE a.estado = "1"');

        JavaScript::put([
            "alumnos_noveno" => $alumnosN,
            "alumnos_primero" => $alumnosP,
            "alumnos_segundo"  => $alumnosS, 
            "alumnos_all" => $alumnosall,
        ]);

        return view('admin.record_escolar',compact('data', 'alumnosN','alumnosP','alumnosS'));
    }

        
    public function store(Request $request)
    {
        $mat = '2';
        $mat2 = '7';
        $mat3 = '8';
        $mat4 = '6';
       $record = new Record(array(
        'carnet_alumno' => $request->get('carnet'),
        'id_periodo' =>$request->get('periodo'),
        'id_materia'=>$mat,
        'id_grado' =>$request->get('grado'),
        'nota' =>$request->get('mat_nota'),
        ));
       $record->save();

       $record = new Record(array(
        'carnet_alumno' => $request->get('carnet'),
        'id_periodo' =>$request->get('periodo'),
        'id_materia' =>$mat2,
        'id_grado' =>$request->get('grado'),
        'nota' =>$request->get('cien_nota'),
        ));
       $record->save();

       $record = new Record(array(
        'carnet_alumno' => $request->get('carnet'),
        'id_periodo' =>$request->get('periodo'),
        'id_materia' =>$mat3,
        'id_grado' =>$request->get('grado'),
        'nota' =>$request->get('soc_nota'),
        ));
       $record->save();

       $record = new Record(array(
        'carnet_alumno' => $request->get('carnet'),
        'id_periodo' =>$request->get('periodo'),
        'id_materia' =>$mat4,
        'id_grado' =>$request->get('grado'),
        'nota' =>$request->get('leng_nota'),
        ));
       $record->save();
    }

    public function edit($id){

        $datos = json_decode($_GET['data']);
       // $notas_alumno = DB::select('SELECT DISTINCT n.carnet_alumno, a.nombres, a.apellidos, n.id_periodo, n.id_materia, n.nota FROM notas_mined n INNER JOIN alumno a ON n.carnet_alumno = a.carnet_alumno INNER JOIN grado_mined g ON n.id_grado = g.id_grado_mined WHERE (n.carnet_alumno = "'+$datos[0]+'") AND (n.id_periodo = "1") AND (g.id_grado_mined = "1")');
        $notas = Record::join('alumno', 'notas_mined.carnet_alumno','=', 'alumno.carnet_alumno')
                        ->join('grado_mined', 'notas_mined.id_grado', '=', 'grado_mined.id_grado_mined')
                        ->select('notas_mined.carnet_alumno', 'alumno.nombres', 'alumno.apellidos', 'notas_mined.id_periodo', 'notas_mined.id_materia', 'notas_mined.nota')
                        ->where('notas_mined.carnet_alumno', '=', $datos[0])
                        ->where('notas_mined.id_periodo', '=', $datos[1])
                        ->where('grado_mined.id_grado_mined', '=', $datos[2])
                        ->get();

        return response()->json($notas);
    }

    public function show($id, Request $request)
    {        
        $grado = json_decode($_GET['array']);
        $record = Record::join('alumno', 'notas_mined.carnet_alumno','=', 'alumno.carnet_alumno')
                            ->select('notas_mined.carnet_alumno', 'alumno.nombres', 'alumno.apellidos', 'notas_mined.id_grado','notas_mined.id_periodo', 'notas_mined.id_materia', 'notas_mined.nota')
                            ->where('notas_mined.carnet_alumno', '=', $id)
                            ->where('notas_mined.id_grado', '=', $grado[1])
                            ->orderBy('id_grado')
                            ->orderBy('id_periodo')                            
                            ->get();                                   
        
        return response()->json(array($record->toArray(), $grado));
    }

    
}
