<?php

namespace App\Http\Controllers\institute;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Students;
use App\Teachers;
use Validator;
use Auth;

class studentController extends Controller
{
    public function index()
    {
        $teachers=Teachers::where('institute_id',Auth::user()->institute_id)->get();
    	return view('institute.addstudent',['user'=>Auth::user(),'teachers'=>$teachers]);
    }
    public function addStudent(Request $request)
    {
        $form_data=$request->all();
        //dd($form_data);
        $validator = Validator::make($form_data, [
			'name'=> 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:table_teachers',
            'unique_id'=> 'required|string|max:255|unique:table_students',
			'program' => 'required|string|max:255',
			'department'=> 'required|string|max:255',
            'year'=> 'required|string|max:255',
            'select_teacher'=> 'required|int',
        ]);
      
        if($validator->fails()){

            $errors = $validator->errors();
            return redirect('/addStudent')->withErrors($validator)->withInput(); 
        }
       // dd(($form_data['select_teacher']));
        $t = bin2hex(openssl_random_pseudo_bytes(40));
        Students::Create([
            'teacher_id'=>$form_data['select_teacher'],
            'institute_id'=>Auth::user()->institute_id,
            'name'=>$form_data['name'],
            'email'=>$form_data['email'],
            'unique_id'=>$form_data['unique_id'],
            'program'=>$form_data['program'],
            'department'=>$form_data['department'],
            'year'=>$form_data['year'],
            'remember_token'=>$t
        ]);
        // Add Student Mail
        // Mail::to($form_data['email'])->send(new TeacherInvitation(Auth::user()->institute_name));
        return redirect()->back()->with('message',$form_data['name'].' as a student has been successfully added');
    }
}
