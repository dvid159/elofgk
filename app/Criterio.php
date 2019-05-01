<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Criterio extends Model
{
    protected $table = 'criterio';
    public $timestamps = false;
	protected $fillable = ['nombre_criterio'];
}
