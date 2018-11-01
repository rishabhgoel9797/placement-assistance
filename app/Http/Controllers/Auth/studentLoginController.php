<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class studentLoginController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('guest:student',['except'=>['logout']]);
    }
    public function index()
    {
        return view('auth.studentLogin');
    }
    public function login(Request $request)
    {
        $this->validate($request,[
            'email'=>'required|email',
            'password'=>'required|min:6'
        ]);
           if(Auth::guard('student')->attempt(['email'=>$request->email,'password'=>$request->password],$request->remember))
           {
               return redirect(route('student.dashboard'));
           }
           return redirect()->back()->withInput($request->only('email','remember'));
    //     $form_data=$request->all();
    //    return view('teacherHome');

    }
    public function logout()
    {
        Auth::guard('student')->logout();
        return redirect('/');
    }
}
