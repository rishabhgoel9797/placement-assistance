<?php

namespace App\Http\Controllers\teacher;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use DB;
use App\User;
use App\Teachers;
use App\Company;

class companyDetails extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth:teacher');
    }
    public function index() {
        // $ins_not=DB::table('institute_notifications')->where('institute_id',Auth::user()->institute_id)->get();
        $teacher=Auth::guard('teacher')->user();
        $institute_id=Teachers::where('teacher_id',$teacher->teacher_id)->value('institute_id');
        $org_id=$teacher->institute_id;
        $ins_pro=User::where('institute_id',$institute_id)->value('avatar');
        $ins_not=DB::table('institute_notifications')->where('institute_id',$institute_id)->get();
        $companyDetails=Company::where('institute_id',$org_id)->get();
        $count=1;
        return view('teacher.companyDetails',['ins_not'=>$ins_not,'ins_pro'=>$ins_pro,
        'companyDetails'=>$companyDetails,'count'=>$count]);
    }
}
