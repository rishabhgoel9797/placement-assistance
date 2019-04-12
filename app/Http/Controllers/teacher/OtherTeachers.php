<?php

namespace App\Http\Controllers\teacher;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use DB;
use App\User;
use App\Teachers;

class OtherTeachers extends Controller
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
        $otherTeachers = Teachers::where('institute_id',$institute_id)->where('department',$teacher->department)
        ->where('teacher_id','!=',$teacher->teacher_id)->get();
        return view('teacher.others',['ins_not'=>$ins_not,'ins_pro'=>$ins_pro,
        'otherTeachers'=>$otherTeachers]);
    }
}
