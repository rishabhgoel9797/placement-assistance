<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class teacherLoginController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('guest:teacher',['except'=>['logout']]);
    }
    public function index()
    {
        return view('auth.teacherLogin');
    }
    public function login(Request $request)
    {
        $this->validate($request,[
            'email'=>'required|email',
            'password'=>'required|min:6'
        ]);
           if(Auth::guard('teacher')->attempt(['email'=>$request->email,'password'=>$request->password],$request->remember))
           {
               return redirect(route('teacher.dashboard'));
           }
           return redirect()->back()->withInput($request->only('email','remember'));
    //     $form_data=$request->all();
    //    return view('teacherHome');

    }
    public function logout()
    {
        Auth::guard('teacher')->logout();
        return redirect('/');
    }

}
