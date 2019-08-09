<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\record;
use Illuminate\Support\Facades\Session;
// use Illuminate\Auth\Access\Response;

class RecordEscolarController extends Controller
{
    public function index()
    {
        // $data = DB::table('alumno')->get();
         $data = DB::select('SELECT class.anho_egreso FROM class ORDER BY(class.anho_egreso) DESC limit 3');    
         $alumnos = DB::select('SELECT a.carnet_alumno, a.nombres, a.apellidos FROM expediente_fgk.alumno a WHERE a.estado = 1');    
        return view('admin.record_escolar',compact('data', 'alumnos'));
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

    public function show($id)
    {        
        $record = Record::join('alumno', 'alumno.carnet_alumno', '=', 'notas_mined.carnet_alumno')
        ->select('nota_mined.carnet_alumno, alumno.nombres, alumno.apellidos, notas_miined.id_materia, notas_mined.nota')
                        ->where('notas_mined.carnet_alumno', '=', $id)
                        ->get();
                       
                        // return response()->json($record->toArray());
        //$record = DB::select('SELECT nm.carnet_alumno, a.nombres, a.apellidos, nm.id_periodo, nm.id_materia, nm.nota FROM notas_mined nm JOIN alumno a ON (nm.carnet_alumno = a.carnet_alumno)');
       // $record = Record::where('carnet_alumno',$id)->get();
        return response()->json($record->toArray());
    }

    public function mostrar_alumnos_por_id($id){
        $data = DB::select('SELECT class.anho_egreso FROM class ORDER BY(class.anho_egreso) DESC limit 3');    
         $alumnos = DB::select('SELECT a.carnet_alumno, a.nombres, a.apellidos FROM expediente_fgk.alumno a WHERE a.estado = 1');    
        return view('admin.record_escolar',compact('data', 'alumnos'));
    }
}
