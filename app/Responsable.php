<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
class Responsable extends Model
{
    protected $table = 'Responsable';
    public $timestamps = false;
	protected $fillable = ['dui','carnet_alumno','id_tipo_responsable','id_ocupacion','nombres','apellidos','telefono','direccion','observaciones'];
}
