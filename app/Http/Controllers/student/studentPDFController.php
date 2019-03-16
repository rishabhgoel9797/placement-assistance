<?php

namespace App\Http\Controllers\student;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Students;
use DB;
use Auth;
use Image;
use PDF;


class studentPDFController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth:student');
    }
    public function index()
    {
        $student=Auth::guard('student')->user();
        $institute_id=Students::where('student_id',$student->student_id)->value('institute_id');
        $ins_pro=User::where('institute_id',$institute_id)->value('avatar');
    	$ins_not=DB::table('institute_notifications')->where('institute_id',$institute_id)->get();
    	return view('student.profilestudent',array('user' => Auth::user(),'ins_not'=>$ins_not,'ins_pro'=>$ins_pro));
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

       $student=Auth::guard('student')->user();
       $institute_id=Students::where('student_id',$student->student_id)->value('institute_id');
       $ins_pro=User::where('institute_id',$institute_id)->value('avatar');
       $ins_not=DB::table('institute_notifications')->where('institute_id',$institute_id)->get();
       return view('student.profilestudent',array('user' => Auth::user(),'ins_not'=>$ins_not,'ins_pro'=>$ins_pro));
    }
    public function fun_pdf()
    {
    	$pdf= PDF::loadView('profilestudent');
    	return $pdf->download('profilestudent.pdf');
    }
}
