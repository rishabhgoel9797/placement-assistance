<?php

namespace App\Http\Controllers\teacher;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use DB;
use App\User;
use App\Teachers;
use App\Students;

class studentDetails extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth:teacher');
    }
    public function index() {
        $teacher=Auth::guard('teacher')->user();
        $institute_id=Teachers::where('teacher_id',$teacher->teacher_id)->value('institute_id');
        $org_id=$teacher->institute_id;
        $ins_pro=User::where('institute_id',$institute_id)->value('avatar');
        $ins_not=DB::table('institute_notifications')->where('institute_id',$institute_id)->get();
        $studentDetails=Students::where('teacher_id',$teacher->teacher_id)->where('institute_id',$org_id)->where('status','pending')->get();
        foreach($studentDetails as $key=>$value) {
            $eduDetails=DB::table('education_details')->where('student_id',$value->student_id)->get();
            $studentDetails[$key]=collect($value)->merge($eduDetails);
        }
        // dd($studentDetails);
        return view('teacher.studentDetails',['ins_not'=>$ins_not,'ins_pro'=>$ins_pro,
        'studentDetails'=>$studentDetails]);
    }
    public function approve($id) {
        Students::where('student_id',$id)->update(['status'=>'Approve']);
        return redirect()->back()->with('message','Student has been Approved');
    }
}
