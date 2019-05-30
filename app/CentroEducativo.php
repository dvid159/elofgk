<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CentroEducativo extends Model
{
    protected $table = 'centro_educativo';
    public $timestamps = false;
	protected $fillable = ['codigo_centro_educativo','nombre_centro_educativo','direccion','telefono','id_municipio','descripcion','sector','zona','categoria'];
}
 