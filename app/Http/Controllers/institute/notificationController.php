<?php

namespace App\Http\Controllers\institute;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use DB;
use Auth;

class notificationController extends Controller
{
    public function index()
    {
    	return view('institute.notification',['user'=>Auth::user()]);
    }
    public function addNotification(Request $request)
    {
        $form_data=$request->all();
        $validator = Validator::make($form_data, [
			'title'=> 'required|string|max:255',
			'description'=> 'required|string|max:255',
        ]);
        if($validator->fails()){

            $errors = $validator->errors();
            return redirect('/notification')->withErrors($validator)->withInput(); 
        }
        DB::table('institute_notifications')->insert(['institute_id'=>Auth::user()->institute_id,'title'=>$form_data['title'],'description'=>$form_data['description']]);
        return redirect()->back()->with('message',$form_data['title'].' notification has been successfully added');
    }
}
