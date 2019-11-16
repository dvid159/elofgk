<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Aptitud extends Model
{
    protected $table = 'aptitud';
    public $timestamps = false;
	protected $fillable = ["id_aptitud", "id_criterio", "nombre_aptitud", "descripcion"];
}
