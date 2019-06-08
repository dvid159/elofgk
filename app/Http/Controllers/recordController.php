<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\record;
use Illuminate\Support\Facades\Session;
use Illuminate\Auth\Access\Response;

class recordController extends Controller
{
    public function index()
    {
        // $data = DB::table('alumno')->get();
        // ,compact('data')s
        return view('admin.record_alumno');
    }

    
}