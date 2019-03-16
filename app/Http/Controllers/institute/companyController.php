<?php

namespace App\Http\Controllers\institute;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use App\Company;
use DB;
use Auth;

class companyController extends Controller
{
    public function index()
    {
        $datewise=DB::table('table_company')->
        select('created_date', DB::raw('count(*) as total'))
        ->groupBy('created_date')
        ->get();
        //dd($datewise);
        return view('institute.addcompany',['user'=>Auth::user(),'datewise'=>$datewise]);
    }
    public function addCompany(Request $request)
    {
        $form_data=$request->all();
        //dd($form_data);
        $validator = Validator::make($form_data, [
            'company_name'=> 'required|string|max:255',
            'job_role'=> 'required|string|max:255',
            'company_description'=> 'required|string',
            'job_description'=> 'required|string',
            'location'=> 'required|string|max:255',
            'ctc'=> 'required|string|max:255',
            'department'=> 'required|string',
            'category'=> 'required|string|max:255',
            'tenth'=> 'required|string|max:255',
            'twelth'=> 'required|string|max:255',
            'graduate'=> 'required|string|max:255',
            // 'round_number'=>'required|string|max:255',
            // 'round_title'=>'required|string|max:255',
            
        ]);
        if($validator->fails()){

            $errors = $validator->errors();
            return redirect('/addCompany')->withErrors($validator)->withInput(); 
        }
        
        $company=Company::Create([
            'institute_id'=>Auth::user()->institute_id,
            'company_name'=>$form_data['company_name'],
            'job_role'=>$form_data['job_role'],
            'company_description'=>$form_data['company_description'],
            'job_description'=>$form_data['job_description'],
            'location'=>$form_data['location'],
            'ctc'=>$form_data['ctc'],
            'department'=>$form_data['department'],
            'category'=>$form_data['category'],
            'tenth'=>$form_data['tenth'],
            'twelth'=>$form_data['twelth'],
            'graduate'=>$form_data['graduate'],
            'created_date'=>date('Y-m-d')
        ]);

        // dd($company);
        $round_number=$form_data['round_number'];
        $round_title=$form_data['round_title'];
        foreach($round_number as $key=>$value)
        {
            DB::table('company_rounds')->insert(['company_id'=>$company->company_id,'institute_id'=>Auth::user()->institute_id,'round_number'=>$value,'round_title'=>$round_title[$key]]);
        }
        return redirect()->back()->with('message',$form_data['company_name'].' been successfully added');
    }

    public function viewCompanies() {
        $count=1;
        $institute_id=Auth::user()->institute_id;
        $companies=Company::where('institute_id',$institute_id)->where('status','upcoming')->get();
        $ongoing_companies=Company::where('institute_id',$institute_id)->where('status','ongoing')->get();
        // dd($companies);
        return view('institute.viewCompanies',['companies'=>$companies,'count'=>$count,
        'ongoing_companies'=>$ongoing_companies]);
    }
    public function individualCompany($id) {
        $basic_info=Company::where('institute_id', Auth::user()->institute_id)
        ->where('company_id',$id)->first();
        $company_rounds=DB::table('company_rounds')->where('institute_id', Auth::user()->institute_id)
        ->where('company_id',$id)->get();
        // dd($basic_info);
        return view('institute.individualCompany',['basic_info'=>$basic_info,'company_rounds'=>$company_rounds]);
    } 

}
