<?php

namespace App\Http\Controllers\student;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Students;
use App\User;
use DB;
use Auth;
class addprofileController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth:student');
    }
    public function addprofile()
    {
    	$student=Auth::guard('student')->user();
        $institute_id=Students::where('student_id',$student->student_id)->value('institute_id');
        $ins_pro=User::where('institute_id',$institute_id)->value('avatar');
    	$ins_not=DB::table('institute_notifications')->where('institute_id',$institute_id)->get();
    	return view('student.addprofile',['ins_not'=>$ins_not,'ins_pro'=>$ins_pro]);
    }
}
