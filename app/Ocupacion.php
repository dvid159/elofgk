<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
class Ocupacion extends Model
{
    protected $table = 'ocupacion';
    public $timestamps = false;
	protected $fillable = ['id_ocupacion','ocupacion','descripcion'];
}
