<?php

namespace App\Http\Controllers\institute;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use DB;
use Auth;
use Excel;

class notificationController extends Controller
{
    public function index()
    {
        $count=1;
        $notifications=DB::table('institute_notifications')->where('institute_id',Auth::user()->institute_id)->get();
        $ins_not=DB::table('institute_notifications')->where('institute_id',Auth::user()->institute_id)->count();
        return view('institute.notification',['user'=>Auth::user(),'ins_not'=>$ins_not,
        'notifications'=>$notifications,'count'=>$count]);
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
       // dd(Auth::user()->institute_id);
        DB::table('institute_notifications')->insert(['institute_id'=>Auth::user()->institute_id,'title'=>$form_data['title'],'description'=>$form_data['description']]);
        return redirect()->back()->with('message',$form_data['title'].' notification has been successfully added');
    }
    public function export(Request $request)
    {
        $form=$request->all();
        $data=DB::table('institute_notifications')->select('title','description','created_at')
        ->where('institute_id',Auth::user()->institute_id)->get()->toArray();

        $data= json_decode( json_encode($data), true);
        //dd($data);
        return Excel::create('institute_notifications'.$form['radio_export'],function($excel) use ($data){
            $excel->sheet('Institute Notifications',function($sheet) use ($data)
            {
                $sheet->fromArray($data);
            });
        })->download($form['radio_export']);
    }

    public function viewNotifications() {
        $count=1;
        $institute_id=Auth::user()->institute_id;
        $notifications=Notification::where('institute_id',$institute_id)->get();
        return view('institute.viewNotifications',['notifications'=>$notifications,'count'=>$count]);
    }
}
