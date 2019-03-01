<?php

namespace App\Http\Controllers\institute;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\Teachers;
use Validator;
use App\Mail\TeacherInvitation;
use Mail;
use DB;
use Excel;
class teacherController extends Controller
{
    public function index()
    {
        $datewise=DB::table('table_teachers')->
        select('created_date', DB::raw('count(*) as total'))
        ->groupBy('created_date')
        ->get();
        $teachers_count=Teachers::where('institute_id',Auth::user()->institute_id)->count();
    	return view('institute.addteacher',['user'=>Auth::user(),'teachers_count'=>$teachers_count,'datewise'=>$datewise]);
    }
    public function addTeacher(Request $request)
    {
        $form_data=$request->all();
        $validator = Validator::make($form_data, [
			'name'=> 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:table_teachers',
			'unique_id' => 'required|string|max:255|unique:table_teachers',
			'program'=> 'required|string|max:255',
			'department'=> 'required|string|max:255',
        ]);
        if($validator->fails()){

            $errors = $validator->errors();
            return redirect('/addTeacher')->withErrors($validator)->withInput(); 
        }
        $t = bin2hex(openssl_random_pseudo_bytes(40));
        Teachers::Create([
            'institute_id'=>Auth::user()->institute_id,
            'name'=>$form_data['name'],
            'email'=>$form_data['email'],
            'unique_id'=>$form_data['unique_id'],
            'program'=>$form_data['program'],
            'department'=>$form_data['department'],
            'remember_token'=>$t,
            'created_date'=>date('Y-m-d')
        ]);
        Mail::to($form_data['email'])->send(new TeacherInvitation(Auth::user()->institute_name));
        return redirect()->back()->with('message',$form_data['name'].' as a teacher has been successfully added');
    }
    public function viewTeachers() {
        $count=1;
        $institute_id=Auth::user()->institute_id;
        $teachers=Teachers::where('institute_id',$institute_id)->get();
        return view('institute.viewTeachers',['teachers'=>$teachers,'count'=>$count]);
        // dd($teachers);
    }
    public function export(Request $request)
    {
        $form=$request->all();
        $data=DB::table('table_teachers')->select('name','email','unique_id','program','department','created_at')
        ->where('institute_id',Auth::user()->institute_id)->get()->toArray();

        $data= json_decode( json_encode($data), true);
        //dd($data);
        return Excel::create('teachers_'.$form['radio_export'],function($excel) use ($data){
            $excel->sheet('Teachers Details',function($sheet) use ($data)
            {
                $sheet->fromArray($data);
            });
        })->download($form['radio_export']);
    }
}
