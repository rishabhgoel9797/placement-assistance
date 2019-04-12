<?php

namespace App\Http\Controllers\student;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\Students;
use App\User;
use DB;

class eligibility extends Controller
{
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
        $edu_details=DB::table('education_details')->where('institute_id',$institute_id)->where('student_id', $student->student_id)->first();
        $status=Students::where('student_id', $student->student_id)->value('status');
        $student_ed_details=DB::table('education_details')->where('student_id',$student->student_id)->get();
        return view('student.eligibility',['ins_not'=>$ins_not,'ins_pro'=>$ins_pro,
        'companies'=>$companies,'edu_details'=>$edu_details,
        'student'=>$student, 'status'=>$status,
        'student_ed_details'=>$student_ed_details]);
    }
}
