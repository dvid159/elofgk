<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\TipoResponsable;
use App\Http\Controllers\Controller;

class TipoResponsableController extends Controller
{
    public function store(Request $request)
    {
       $tipo = new TipoResponsable(array(
        'tipo_responsable' => $request->get('tipo_responsable')
       ));
       $tipo->save();
    }
}
