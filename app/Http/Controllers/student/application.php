<?php

namespace App\Http\Controllers\student;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\Students;
use App\User;
use DB;

class application extends Controller
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
        $companies = DB::table('table_company')->where('institute_id',$institute_id)->get();
        $status=Students::where('student_id', $student->student_id)->value('status');
        $applied=DB::table('company_eligible')->where('student_id',$student->student_id)->where('status','Applied')->get();
        $rejected=DB::table('company_eligible')->where('student_id',$student->student_id)->where('status','Rejected')->get();
        $offered=DB::table('company_eligible')->where('student_id',$student->student_id)->where('status','Offered')->get();
        return view('student.applications',['ins_not'=>$ins_not,'ins_pro'=>$ins_pro,
        'companies'=>$companies,'applied'=>$applied,
        'rejected'=>$rejected,'offered'=>$offered,
        'student'=>$student, 'status'=>$status]);
    }
}
