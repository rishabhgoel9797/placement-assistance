<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Students;
use App\User;
use Auth;
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
        $student=Auth::guard('student')->user();
        $institute_id=Students::where('student_id',$student->student_id)->value('institute_id');
        $ins_pro=User::where('institute_id',$institute_id)->value('avatar');
    	$ins_not=DB::table('institute_notifications')->where('institute_id',$institute_id)->get();
        return view('studentHome',['ins_not'=>$ins_not,'ins_pro'=>$ins_pro]);
    }
}
