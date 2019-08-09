<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Materia extends Model
{
    public $timestamps = false;
    protected $table = 'materia';
	protected $fillable = ['nombre_materia'];
}
