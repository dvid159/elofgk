<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Alumno extends Model
{
    protected $table = 'alumno';
    public $timestamps = false;
	protected $fillable = [
        'carnet_alumno',
        'id_class',
        'nombres',
        'apellidos',
        'sexo',
        'fecha_nacimiento',
        'foto',
        'telefono',
        'direccion',
        'id_municipio',
        'email',
        'codigo_centro_educativo',
        'turno_educativo',
        'estado',
        'observaciones'];
}
 