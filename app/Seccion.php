<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Seccion extends Model
{
    protected $table = 'seccion';
    public $timestamps = false;
	protected $fillable = ['id_seccion','id_class','anho','descripcion'];
}
