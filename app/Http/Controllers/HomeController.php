<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ins_not=DB::table('institute_notifications')->where('institute_id',Auth::user()->institute_id)->count();
        $comp_count=DB::table('table_company')->where('institute_id',Auth::user()->institute_id)->count();
        $stu_count=DB::table('table_students')->where('institute_id',Auth::user()->institute_id)->count();
        $tea_count=DB::table('table_teachers')->where('institute_id',Auth::user()->institute_id)->count();
        return view('home',['user'=>Auth::user(),'ins_not'=>$ins_not,'comp_count'=>$comp_count,
        'stu_count'=>$stu_count,'tea_count'=>$tea_count]);
    }
}
