<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Ocupacion;
use App\Http\Controllers\Controller;

class OcupacionController extends Controller
{
    public function store(Request $request)
    {
       $tipo = new Ocupacion(array(
        'ocupacion' => $request->get('ocupacion')
       ));
       $tipo->save();
    }
}
