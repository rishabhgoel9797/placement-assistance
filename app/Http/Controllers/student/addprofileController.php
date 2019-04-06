<?php

namespace App\Http\Controllers\student;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Students;
use App\User;
use DB;
use Auth;
class addprofileController extends Controller
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
        $status=Students::where('student_id', $student->student_id)->value('status');
        return view('student.addprofile',['ins_not'=>$ins_not,'ins_pro'=>$ins_pro,'status'=>$status]);
    }
    public function addProfile(Request $request)
    {
        $form=$request->all();
        //dd($form);
        $validator = \Validator::make($form, [
            'gender'=> 'required|string|max:255',
            'address'=> 'required|string|max:255',
            'contact'=> 'required|string|max:255',
            'altcontact'=> 'required|string|max:255',
            'school'=> 'required|string|max:255',
            'board'=> 'required|string|max:255',
            'yearofpassing'=> 'required|string|max:255',
            'percentage'=> 'required|string|max:255',
            'institution'=> 'required|string|max:255',
            '12board'=> 'required|string|max:255',
            '12yop'=> 'required|string|max:255',
            '12percentage'=> 'required|string|max:255',
            'under_institution'=> 'required|string|max:255',
            'under_university'=> 'required|string|max:255',
            'under_course'=> 'required|string|max:255',
            'under_department'=> 'required|string|max:255',
            'under_yop'=> 'required|string|max:255',
            'under_percentage'=> 'required|string|max:255',
            'company_name'=> 'required|string|max:255',
            'jobtitle'=> 'required|string|max:255',
            'location'=> 'required|string|max:255',
            'positiontype'=> 'required|string|max:255',
            'jobsector'=> 'required|string|max:255',
            'details'=> 'required|string|max:255',
            'projecttitle'=> 'required|string|max:255',
            'projectlink'=> 'required|string|max:255',
            'projectdescription'=> 'required|string|max:255',
            'skills'=> 'required|max:255',
            'proficiency'=> 'required|max:255',
            'personalskills'=> 'required|max:255',
            'personalproficiency'=> 'required|max:255',
            'extra_category'=> 'required|string|max:255',
            'extra_description'=> 'required|string|max:255',
            'certification_name'=> 'required|max:255',
            'issuingauthority'=> 'required|max:255',
            'certification_url'=> 'required|max:255',
            // 'round_number'=>'required|string|max:255',
            // 'round_title'=>'required|string|max:255',
            
        ]);
        if($validator->fails()){

            $errors = $validator->errors();
            return redirect('/student/addProfile')->withErrors($validator)->withInput(); 
        }

        $student=Auth::guard('student')->user();
        $student_id=$student->student_id;
        $institute_id=Students::where('student_id',$student->student_id)->value('institute_id');


        $skills=$form['skills'];
        $skill_prof=$form['proficiency'];
        $pers_skill=$form['personalskills'];
        $pers_skill_pro=$form['personalproficiency'];
        foreach( $skills as $key=>$value)
        {
            DB::table('students_skills')->insert(['student_id'=>$student_id,'institute_id'=>$institute_id,
            'tech_skill'=>$value,'tech_skill_prof'=>$skill_prof[$key],'personal_skill'=>$pers_skill[$key],
            'personal_skill_prof'=>$pers_skill_pro[$key]]);
        }

        $cert=$form['certification_name'];
        $issue=$form['issuingauthority'];
        $cert_url=$form['certification_url'];

        foreach($cert as $key=>$value)
        {
            DB::table('students_certifications')->insert(['student_id'=>$student_id,'institute_id'=>$institute_id,
        'name'=>$value,'issuing_authority'=>$issue[$key],'certification_url'=>$cert_url[$key]]);
        }

        DB::table('education_details')->insert(['student_id'=>$student_id,'institute_id'=>$institute_id,
        'ten_ins_name'=>$form['school'],'ten_board'=>$form['board'],'ten_year_passing'=>$form['yearofpassing'],
        'ten_perc'=>$form['percentage'],'twelve_ins_name'=>$form['institution'],
        'twelve_board'=>$form['12board'],'twelve_year_passing'=>$form['12yop'],
        'twelve_perc'=>$form['12percentage'],'graduate_ins_name'=>$form['under_institution'],
        'graduate_univ_name'=>$form['under_university'],'course'=>$form['under_course'],
        'department'=>$form['under_department'],'year_of_passing'=>$form['under_yop'],
        'graduate_perc'=>$form['under_percentage']]);

        DB::table('students_internship')->insert(['student_id'=>$student_id,'institute_id'=>$institute_id,
        'company_name'=>$form['company_name'],'job_title'=>$form['jobtitle'],'Location'=>$form['location'],
        'position_type'=>$form['positiontype'],'job_Sector'=>$form['jobsector'],'details'=>$form['details']]);

        DB::table('students_projects')->insert(['student_id'=>$student_id,'institute_id'=>$institute_id,
        'title'=>$form['projecttitle'],'link'=>$form['projectlink'],'description'=>$form['projectdescription']]);

        DB::table('students_extra_curricular')->insert(['student_id'=>$student_id,'institute_id'=>$institute_id,
        'categories'=>$form['extra_category'],'description'=>$form['extra_description']]);

        return redirect()->back()->with('message','Your Details have been successfully added');

    }
}
