<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Record extends Model
{
    protected $table = 'notas_mined';
    public $timestamps = false;
	protected $fillable = [
        'carnet_alumno',
        'id_periodo',
        'id_materia',
        'id_grado',
        'id_materia',
        'nota'
    ];
}
