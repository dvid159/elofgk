<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GrupoMateria extends Model
{
    protected $table = 'grupo_materia';
    public $timestamps = false;
	protected $fillable = ['id_grupo_materia','id_seccion','id_materia','carnet_empleado','anho','descripcion'];
}
  