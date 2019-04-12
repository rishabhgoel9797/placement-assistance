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
        
        $student_ed_details=DB::table('education_details')->where('student_id',$student->student_id)->get();
        // dd($student_ed_details)
        $status=Students::where('student_id', $student->student_id)->value('status');
        $notifications=DB::table('teacher_notifications')->where('teacher_id',$student->teacher_id)->get();              
        $applied=DB::table('company_eligible')->where('student_id',$student->student_id)
        ->select('status as name',DB::raw('count(*) as y'))
        ->groupBy('status')
        ->get();
        $compsCount = Students::where('institute_id',$institute_id)->where('department',$student->department)
        ->where('student_id','!=',$student->student_id)->count();
        $department_wise_students=DB::table('table_students')->where('institute_id',$institute_id)
        ->select('department as name',DB::raw('count(*) as y'))
        ->groupBy('department')
        ->get();
        return view('studentHome',['status'=>$status,'ins_not'=>$ins_not,'ins_pro'=>$ins_pro,'student_ed_details'=>$student_ed_details,
        'notifications'=>$notifications,'applied'=>$applied,'compsCount'=>$compsCount,
        'department_wise_students'=>$department_wise_students]);
    }
}
