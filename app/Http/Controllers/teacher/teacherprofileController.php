<?php

namespace App\Http\Controllers\teacher;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
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
    	return view('teacher.profileteacher',array('user' => Auth::user()));
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

       return view('teacher.profileteacher',array('user' => Auth::user()));
    }
}