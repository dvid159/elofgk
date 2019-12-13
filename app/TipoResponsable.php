<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
class TipoResponsable extends Model
{
    protected $table = 'tipo_responsable';
    public $timestamps = false;
	protected $fillable = ['id_tipo_responsable','tipo_responsable'];
}
