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
        $department_wise_students=DB::table('table_students')->where('institute_id',$institute_id)
        ->select('department as name',DB::raw('count(*) as y'))
        ->groupBy('department')
        ->get();
        $categoryWise=DB::table('table_company')->where('institute_id',$institute_id)->
        select('category', DB::raw('count(*) as total'))
        ->groupBy('category')
        ->get();
        return view('teacherHome',['ins_not'=>$ins_not,'ins_pro'=>$ins_pro,
        'department_wise_students'=>$department_wise_students,
        'categoryWise'=>$categoryWise]);
    }
    
}
