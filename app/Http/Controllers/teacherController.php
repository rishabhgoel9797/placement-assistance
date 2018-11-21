<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Teachers;
use App\User;
use Auth;
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
        $teacher=Auth::guard('teacher')->user();
        $institute_id=Teachers::where('teacher_id',$teacher->teacher_id)->value('institute_id');
        $ins_pro=User::where('institute_id',$institute_id)->value('avatar');
    	$ins_not=DB::table('institute_notifications')->where('institute_id',$institute_id)->get();
        return view('teacherHome',['ins_not'=>$ins_not,'ins_pro'=>$ins_pro]);
    }
    
}
