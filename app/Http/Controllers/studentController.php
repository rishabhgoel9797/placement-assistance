<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class studentController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth:student');
    }
    public function index()
    {
    	$ins_not=DB::table('institute_notifications')->get();
        return view('studentHome',['ins_not'=>$ins_not]);
    }
}
