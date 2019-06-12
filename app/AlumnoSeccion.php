<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AlumnoSeccion extends Model
{
    protected $table = 'alumno_seccion';
    public $timestamps = false;
	protected $fillable = [
        'carnet_alumno',
        'id_seccion',
    ];
}
