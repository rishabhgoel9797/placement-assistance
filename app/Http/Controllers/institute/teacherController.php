<?php

namespace App\Http\Controllers\institute;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\AddTeacher;
use Validator;
class teacherController extends Controller
{
    public function index()
    {
    	return view('institute.addteacher',['user'=>Auth::user()]);
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
        AddTeacher::Create([
            'institute_id'=>Auth::user()->institute_id,
            'name'=>$form_data['name'],
            'email'=>$form_data['email'],
            'unique_id'=>$form_data['unique_id'],
            'program'=>$form_data['program'],
            'department'=>$form_data['department'],
            'remember_token'=>$t
        ]);
        return redirect()->back()->with('message',$form_data['name'].' as a teacher has been successfully added');
    }
}
