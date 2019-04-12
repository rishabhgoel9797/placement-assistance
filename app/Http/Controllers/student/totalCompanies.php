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
        $categoryWise=DB::table('table_company')->where('institute_id',$institute_id)->
        select('category', DB::raw('count(*) as total'))
        ->groupBy('category')
        ->get();
        $status=Students::where('student_id', $student->student_id)->value('status');
        $student_ed_details=DB::table('education_details')->where('student_id',$student->student_id)->get();
        return view('student.totalcompanies',['ins_not'=>$ins_not,'ins_pro'=>$ins_pro,
        'mass'=>$mass,'dream'=>$dream,'superdream'=>$superdream,'categoryWise'=>$categoryWise,
        'status'=>$status,
        'student_ed_details'=>$student_ed_details]);
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
        $student_ed_details=DB::table('education_details')->where('student_id',$student->student_id)->get();
        $eligibility = DB::table('company_eligible')->where('company_id',$id)->where('student_id',$student->student_id)->count();
        $status=Students::where('student_id', $student->student_id)->value('status');
        return view('student.individualCompany',['ins_not'=>$ins_not,'ins_pro'=>$ins_pro,'basic_info'=>$basic_info,
        'company_rounds'=>$company_rounds,'student'=>$student,'eligibility'=>$eligibility, 'status'=>$status,
        'student_ed_details'=>$student_ed_details]);
    }
    public function apply($companyId,$studentId) {
        $company_name = DB::table('table_company')->where('company_id', $companyId)->value('company_name');
        $unique_id = DB::table('table_students')->where('student_id', $studentId)->value('unique_id');
        DB::table('company_eligible')->insert(['company_id'=>$companyId,
        'student_id'=>$studentId,'company_name'=>$company_name,
        'student_unique_id'=>$unique_id]);
        return redirect()->back()->with('message', 'You have been successfully applied');
    }
}
