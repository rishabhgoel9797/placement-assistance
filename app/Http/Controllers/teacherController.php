<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class teacherController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth:teacher');
    }
    public function index()
    {
    	$ins_not=DB::table('institute_notifications')->get();
        return view('teacherHome',['ins_not'=>$ins_not]);
    }
    
}
