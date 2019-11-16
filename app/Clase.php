<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Clase extends Model
{
    protected $table = 'class';
    public $timestamps = false;
	protected $fillable = ['id_class','anho_ingreso','anho_egreso','descripcion'];
}
