<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Municipio extends Model
{
    protected $table = 'municipio';
    public $timestamps = false;
	protected $fillable = ['id_departamento','municipio'];
}
