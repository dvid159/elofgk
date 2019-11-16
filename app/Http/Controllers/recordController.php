<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\record;
use Illuminate\Support\Facades\Session;


class recordController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        // $data = DB::table('alumno')->get();
        // ,compact('data')s
        return view('admin.record_alumno');
    }

    
}