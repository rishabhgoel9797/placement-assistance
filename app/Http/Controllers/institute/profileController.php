<?php

namespace App\Http\Controllers\institute;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Image;

class profileController extends Controller
{
    public function index()
    {
    	return view('institute.profile',array('user' => Auth::user()));
    }

    public function update_avatar(Request $request)
    {
       if ($request->hasFile('avatar')) {
       	$avatar=$request->file('avatar');
       	$filename=time().'.'.$avatar->getClientOriginalExtension();
       	Image::make($avatar)->resize(300,300)->save(public_path('/uploads/avatars/'.$filename));

       	$user=Auth::user();
       	$user->avatar=$filename;
       	$user->save();
       }

       return view('institute.profile',array('user' => Auth::user()));
    }
}
