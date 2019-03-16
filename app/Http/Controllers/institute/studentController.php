<?php

namespace App\Http\Controllers\institute;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Students;
use App\Teachers;
use Validator;
use Auth;
use DB;
use Excel;
class studentController extends Controller
{
    public function index()
    {
        $teachers=Teachers::where('institute_id',Auth::user()->institute_id)->get();
        $datewise=DB::table('table_students')->
        select('created_date', DB::raw('count(*) as total'))
        ->groupBy('created_date')
        ->get();

        // dd($department_wise_students);

        $students_count=Students::where('institute_id',Auth::user()->institute_id)->count();
    	return view('institute.addstudent',['user'=>Auth::user(),'students_count'=>$students_count,'teachers'=>$teachers,'datewise'=>$datewise]);
    }
    public function addStudent(Request $request)
    {
        $form_data=$request->all();
        //dd($form_data);
        $validator = Validator::make($form_data, [
			'name'=> 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:table_teachers',
            'unique_id'=> 'required|string|max:255|unique:table_students',
			'program' => 'required|string|max:255',
			'department'=> 'required|string|max:255',
            'year'=> 'required|string|max:255',
            'select_teacher'=> 'required|int',
        ]);
      
        if($validator->fails()){

            $errors = $validator->errors();
            return redirect('/addStudent')->withErrors($validator)->withInput(); 
        }
       // dd(($form_data['select_teacher']));
        $t = bin2hex(openssl_random_pseudo_bytes(40));
        Students::Create([
            'teacher_id'=>$form_data['select_teacher'],
            'institute_id'=>Auth::user()->institute_id,
            'name'=>$form_data['name'],
            'email'=>$form_data['email'],
            'unique_id'=>$form_data['unique_id'],
            'program'=>$form_data['program'],
            'department'=>$form_data['department'],
            'year'=>$form_data['year'],
            'remember_token'=>$t,
            'created_date'=>date('Y-m-d')
        ]);
        // Add Student Mail
        // Mail::to($form_data['email'])->send(new TeacherInvitation(Auth::user()->institute_name));
        return redirect()->back()->with('message',$form_data['name'].' as a student has been successfully added');
    }

    public function viewStudents() {
        $count=1;
        $institute_id=Auth::user()->institute_id;
        $students=Students::where('institute_id',$institute_id)->get();
        return view('institute.viewStudents',['students'=>$students,'count'=>$count]);
    }
    public function export(Request $request)
    {
        $form=$request->all();
        $data=DB::table('table_students')->leftJoin('education_details','table_students.student_id','=','education_details.student_id')
        ->select('name','email','unique_id','program','table_students.department','year','ten_ins_name',
        'ten_board','ten_year_passing','ten_perc','twelve_ins_name',
        'twelve_board','twelve_year_passing','twelve_perc','graduate_ins_name',
        'graduate_univ_name','year_of_passing','graduate_perc','table_students.created_at')
        ->where('table_students.institute_id',Auth::user()->institute_id)->get()->toArray();

        $data= json_decode( json_encode($data), true);
        //dd($data);
        return Excel::create('students_'.$form['radio_export'],function($excel) use ($data){
            $excel->sheet('Students Details',function($sheet) use ($data)
            {
                $sheet->fromArray($data);
            });
        })->download($form['radio_export']);
    }
}
