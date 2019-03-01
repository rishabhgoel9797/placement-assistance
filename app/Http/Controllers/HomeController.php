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
        
        $department_wise_students=DB::table('table_students')->where('institute_id',Auth::user()->institute_id)
        ->select('department as name',DB::raw('count(*) as y'))
        ->groupBy('department')
        ->get();
        // dd($department_wise_students);
        $department_wise_teachers=DB::table('table_teachers')->where('institute_id',Auth::user()->institute_id)
        ->select('department as name',DB::raw('count(*) as y'))
        ->groupBy('department')
        ->get();

        $depts_Array=array();
        $department_wise_companies=DB::table('table_company')->where('institute_id',Auth::user()->institute_id)->pluck('department');
        // $i=0;
        foreach($department_wise_companies as $key=>$value)
        {
            array_push($depts_Array,explode(',', $value));
            // $depts_Array[$i++]=explode(',', $value);
        }
        $unique_departments=array();
        foreach($depts_Array as $key=>$value)
        {
            foreach($value as $index=>$deptvalue)
            {
                array_push($unique_departments,$deptvalue);
            }
        }
        $deps_values=array_count_values($unique_departments);
        // dd(array_values($deps_values));

        return view('home',['user'=>Auth::user(),'ins_not'=>$ins_not,'comp_count'=>$comp_count,
        'stu_count'=>$stu_count,'tea_count'=>$tea_count,
        'department_wise_students'=>$department_wise_students,
        'department_wise_teachers'=>$department_wise_teachers,
        'deps_values'=>$deps_values]);
    }
}
