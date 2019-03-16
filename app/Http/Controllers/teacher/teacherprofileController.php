<?php

namespace App\Http\Controllers\teacher;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Teachers;
use DB;
use Auth;
use Image;

class teacherprofileController extends Controller
{
	  public function __construct()
    {
        $this->middleware('auth:teacher');
    }
    public function index()
    {
        $teacher=Auth::guard('teacher')->user();
        $institute_id=Teachers::where('teacher_id',$teacher->teacher_id)->value('institute_id');
        $ins_pro=User::where('institute_id',$institute_id)->value('avatar');
        $ins_not=DB::table('institute_notifications')->where('institute_id',$institute_id)->get();
    	return view('teacher.profileteacher',array('user' => Auth::user(),'ins_not'=>$ins_not,'ins_pro'=>$ins_pro));
    }

    public function update_avatar(Request $request)
    {
       if ($request->hasFile('avatar')) {
       	$avatar=$request->file('avatar');

       	$filename=time().'.'.$avatar->getClientOriginalExtension();
       	// dd($filename);
       	Image::make($avatar)->resize(300,300)->save(public_path('/uploads/avatars/teachers/'.$filename));

       	$user=Auth::guard('teacher')->user();
       //	dd($user);
       	$user->avatar=$filename;
       	$user->save();
       }
       
       $student=Auth::guard('teacher')->user();
       $institute_id=Teachers::where('teacher_id',$teacher->teacher_id)->value('institute_id');
       $ins_pro=User::where('institute_id',$institute_id)->value('avatar');
       $ins_not=DB::table('institute_notifications')->where('institute_id',$institute_id)->get();
       return view('teacher.profileteacher',array('user' => Auth::user(),'ins_not'=>$ins_not,'ins_pro'=>$ins_pro));
    }
}