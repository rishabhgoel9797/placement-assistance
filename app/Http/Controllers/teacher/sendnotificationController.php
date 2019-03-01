<?php

namespace App\Http\Controllers\teacher;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Teachers;
use App\User;
use DB;
use Auth;

class sendnotificationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:teacher');
    }
    public function index() {
        // $ins_not=DB::table('institute_notifications')->where('institute_id',Auth::user()->institute_id)->get();
        $teacher=Auth::guard('teacher')->user();
        $institute_id=Teachers::where('teacher_id',$teacher->teacher_id)->value('institute_id');
        $ins_pro=User::where('institute_id',$institute_id)->value('avatar');
        $ins_not=DB::table('institute_notifications')->where('institute_id',$institute_id)->get();
        return view('teacher.sendnotification',['ins_not'=>$ins_not,'ins_pro'=>$ins_pro]);
    }
    public function sendnotification()
    {
    	
    }
}
