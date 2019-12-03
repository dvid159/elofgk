<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
    protected $table = 'empleado';
    public $timestamps = false;
    protected $fillable = [
        'carnet_empleado',
        'id_cargo',
        'dui',
        'nit',
        'nombres',
        'apellidos',
        'sexo',
        'fecha_nacimiento',
        'telefono',
        'direccion',
        'id_municipio',
        'estado',
        'observaciones',
        'email'];
}
 
