<?php

namespace App\Http\Controllers\student;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\Students;
use App\User;
use DB;

class Competitors extends Controller
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
        $comps = Students::where('institute_id',$institute_id)->where('department',$student->department)
        ->where('student_id','!=',$student->student_id)->get();
        $ins_not=DB::table('institute_notifications')->where('institute_id',$institute_id)->get();
        $status=Students::where('student_id', $student->student_id)->value('status');
        return view('student.competitors',['ins_not'=>$ins_not,'ins_pro'=>$ins_pro,
        'student'=>$student, 'status'=>$status,
        'comps'=>$comps]);
    }
}
