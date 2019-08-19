<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\record;


class recordController extends Controller
{
    public function index()
    {
        // $data = DB::table('alumno')->get();
        // ,compact('data')s
        return view('admin.record_alumno');
    }


}
