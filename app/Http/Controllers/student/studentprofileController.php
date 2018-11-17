<?php

namespace App\Http\Controllers\student;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Image;

class studentprofileController extends Controller
{
	  public function __construct()
    {
        $this->middleware('auth:student');
    }
    public function index()
    {
    	return view('student.profilestudent',array('user' => Auth::user()));
    }

    public function update_avatar(Request $request)
    {
       if ($request->hasFile('avatar')) {
       	$avatar=$request->file('avatar');

       	$filename=time().'.'.$avatar->getClientOriginalExtension();
       	// dd($filename);
       	Image::make($avatar)->resize(300,300)->save(public_path('/uploads/avatars/students/'.$filename));

       	$user=Auth::guard('student')->user();
       //	dd($user);
       	$user->avatar=$filename;
       	$user->save();
       }

       return view('student.profilestudent',array('user' => Auth::user()));
    }
}
