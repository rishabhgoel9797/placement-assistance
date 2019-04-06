<?php

namespace App\Http\Controllers\student;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\Students;
use App\User;
use App\Company;
use DB;

class totalCompanies extends Controller
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
        $mass=DB::table('table_company')->where('institute_id',$institute_id)
        ->where('category','Mass')->count();
        $dream=DB::table('table_company')->where('institute_id',$institute_id)
        ->where('category','Dream')->count();
        $superdream=DB::table('table_company')->where('institute_id',$institute_id)
        ->where('category','SuperDream')->count();
        $categoryWise=DB::table('table_company')->
        select('category', DB::raw('count(*) as total'))
        ->groupBy('category')
        ->get();
        $status=Students::where('student_id', $student->student_id)->value('status');
        return view('student.totalcompanies',['ins_not'=>$ins_not,'ins_pro'=>$ins_pro,
        'mass'=>$mass,'dream'=>$dream,'superdream'=>$superdream,'categoryWise'=>$categoryWise,
        'status'=>$status]);
    }
    public function individualCompany($id) {
        $student=Auth::guard('student')->user();
        $institute_id=Students::where('student_id',$student->student_id)->value('institute_id');
        $ins_pro=User::where('institute_id',$institute_id)->value('avatar');
        $ins_not=DB::table('institute_notifications')->where('institute_id',$institute_id)->get();
        $basic_info=Company::where('institute_id', Auth::user()->institute_id)
        ->where('company_id',$id)->first();
        $company_rounds=DB::table('company_rounds')->where('institute_id', Auth::user()->institute_id)
        ->where('company_id',$id)->get();
        // dd($basic_info);
        $eligibility = DB::table('company_eligible')->where('company_id',$id)->where('student_id',$student->student_id)->count();
        $status=Students::where('student_id', $student->student_id)->value('status');
        return view('student.individualCompany',['ins_not'=>$ins_not,'ins_pro'=>$ins_pro,'basic_info'=>$basic_info,
        'company_rounds'=>$company_rounds,'student'=>$student,'eligibility'=>$eligibility, 'status'=>$status]);
    }
    public function apply($companyId,$studentId) {
        $company_name = DB::table('table_company')->where('company_id', $companyId)->value('company_name');
        DB::table('company_eligible')->insert(['company_id'=>$companyId,
        'student_id'=>$studentId,'company_name'=>$company_name]);
        return redirect()->back()->with('message', 'You have been successfully applied');
    }
}
