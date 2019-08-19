<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\record;

class RecordEscolarController extends Controller
{
    public function index()
    {
        // $data = DB::table('alumno')->get();
         $data = DB::select('SELECT class.anho_egreso FROM class ORDER BY(class.anho_egreso) DESC limit 3');
         $alumnosN = DB::select('SELECT DISTINCT n.carnet_alumno, a.nombres, a.apellidos FROM notas_mined n INNER JOIN alumno a ON n.carnet_alumno = a.carnet_alumno INNER JOIN grado_mined g ON n.id_grado = g.id_grado_mined WHERE (g.grado_mined = "NOVENO") AND (a.estado = 1)  ORDER BY n.carnet_alumno');
         $alumnosP = DB::select('SELECT DISTINCT n.carnet_alumno, a.nombres, a.apellidos FROM notas_mined n INNER JOIN alumno a ON n.carnet_alumno = a.carnet_alumno INNER JOIN grado_mined g ON n.id_grado = g.id_grado_mined WHERE (g.grado_mined = "PRIMER AÑO") AND (a.estado = 1) ORDER BY n.carnet_alumno');
         $alumnosS = DB::select('SELECT DISTINCT n.carnet_alumno, a.nombres, a.apellidos FROM notas_mined n INNER JOIN alumno a ON n.carnet_alumno = a.carnet_alumno INNER JOIN grado_mined g ON n.id_grado = g.id_grado_mined WHERE (g.grado_mined = "SEGUNDO AÑO") AND (a.estado = 1) ORDER BY n.carnet_alumno');

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

    public function update($class){
        $alumnosClase = DB::select('SELECT DISTINCT n.carnet_alumno, a.nombres, a.apellidos FROM notas_mined n INNER JOIN alumno a ON n.carnet_alumno = a.carnet_alumno INNER JOIN grado_mined g ON n.id_grado = g.id_grado_mined WHERE (g.grado_mined = "NOVENO") AND (a.estado = 1)  ORDER BY n.carnet_alumno');
        return response()->json($alumnosClase->toArray());
    }

    public function show($id)
    {
        $record = Record::join('alumno', 'notas_mined.carnet_alumno','=', 'alumno.carnet_alumno')
                            ->select('notas_mined.carnet_alumno', 'alumno.nombres', 'alumno.apellidos', 'notas_mined.id_periodo', 'notas_mined.id_materia', 'notas_mined.nota')
                            ->where('notas_mined.carnet_alumno', '=', $id)
                            ->orderBy('id_periodo')
                            ->get();

        return response()->json(array($record->toArray()));
    }


}
