<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BitacoraCentroEscolarAlumno extends Model
{
    protected $table = 'bitacora_alumno_centro_educativo';
    public $timestamps = false;
	protected $fillable = ["carnet_alumno", "codigo_centro_educativo", "anho", "grado_cursado","observaciones"];
}
