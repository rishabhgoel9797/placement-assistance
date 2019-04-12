<?php

namespace App\Http\Controllers\teacher;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Teachers;
use App\User;
use DB;
use Auth;
use Validator;

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
        $not_count=DB::table('teacher_notifications')->where('teacher_id',$teacher->teacher_id)->count();
        return view('teacher.sendnotification',['ins_not'=>$ins_not,'ins_pro'=>$ins_pro,
        'not_count'=>$not_count]);
    }
    public function sendnotification(Request $request)
    {
        // dd($request);
        $teacher=Auth::guard('teacher')->user();
        $form_data=$request->all();
        $validator = Validator::make($form_data, [
			'title'=> 'required|string|max:255',
            'description'=> 'required|string|max:255',
            'url'=> 'required|string|max:255',
        ]);
        if($validator->fails()){

            $errors = $validator->errors();
            return redirect('/sendNotification')->withErrors($validator)->withInput(); 
        }
       // dd(Auth::user()->institute_id);
        DB::table('teacher_notifications')->insert(['teacher_id'=>$teacher->teacher_id,'title'=>$form_data['title'],'description'=>$form_data['description'],'url'=>$form_data['url']]);
        return redirect()->back()->with('message',$form_data['title'].' notification has been successfully added');
    }
}
