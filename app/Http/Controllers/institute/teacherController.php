<?php

namespace App\Http\Controllers\institute;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\Teachers;
use Validator;
use App\Mail\Invitation;
use Mail;
use DB;
use Excel;
use App\Jobs\sendEmailJob;
use Carbon\Carbon;
class teacherController extends Controller
{
    public function index()
    {
        $datewise=DB::table('table_teachers')->
        select('created_date', DB::raw('count(*) as total'))
        ->groupBy('created_date')
        ->get();
        $teachers_count=Teachers::where('institute_id',Auth::user()->institute_id)->count();
    	return view('institute.addteacher',['user'=>Auth::user(),'teachers_count'=>$teachers_count,'datewise'=>$datewise]);
    }
    public function addTeacher(Request $request)
    {
        $form_data=$request->all();
        $validator = Validator::make($form_data, [
			'name'=> 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:table_teachers',
			'unique_id' => 'required|string|max:255|unique:table_teachers',
			'program'=> 'required|string|max:255',
			'department'=> 'required|string|max:255',
        ]);
        if($validator->fails()){

            $errors = $validator->errors();
            return redirect('/addTeacher')->withErrors($validator)->withInput(); 
        }
        $t = bin2hex(openssl_random_pseudo_bytes(40));
        Teachers::Create([
            'institute_id'=>Auth::user()->institute_id,
            'name'=>$form_data['name'],
            'email'=>$form_data['email'],
            'unique_id'=>$form_data['unique_id'],
            'program'=>$form_data['program'],
            'department'=>$form_data['department'],
            'remember_token'=>$t,
            'created_date'=>date('Y-m-d')
        ]);
        Mail::to($form_data['email'])->send(new Invitation(Auth::user()->institute_name, 'Teacher'));
        return redirect()->back()->with('message',$form_data['name'].' as a teacher has been successfully added');
    }
    public function viewTeachers() {
        $count=1;
        $institute_id=Auth::user()->institute_id;
        $teachers=Teachers::where('institute_id',$institute_id)->get();
        return view('institute.viewTeachers',['teachers'=>$teachers,'count'=>$count]);
        // dd($teachers);
    }
    public function export(Request $request)
    {
        $form=$request->all();
        $data=DB::table('table_teachers')->select('name','email','unique_id','program','department','created_at')
        ->where('institute_id',Auth::user()->institute_id)->get()->toArray();

        $data= json_decode( json_encode($data), true);
        //dd($data);
        return Excel::create('teachers_'.$form['radio_export'],function($excel) use ($data){
            $excel->sheet('Teachers Details',function($sheet) use ($data)
            {
                $sheet->fromArray($data);
            });
        })->download($form['radio_export']);
    }
    public function importTeachers(Request $request)
	{
    try {
        if($request->hasFile('file_teacher')){
            $path = $request->file('file_teacher')->getRealPath();
            $data = \Excel::load($path, function($reader) {
            })->get();
                $invitation_id_initial=DB::table('table_teachers')->orderBy('teacher_id','DESC')->take(1)->pluck('teacher_id');
                $count_initial=$invitation_id_initial->count();
                if($count_initial==0)
                {
                    $invitation_id_initial=1;
                }
                foreach ($data as $key => $value) {
                    if (!isset($value->email)) {
                        return redirect()->back()->with('error', "We don't support multiple sheets in excel file please upload according to our Template.");
                    }
                    if ( !empty($value->email)) {
                        $t = bin2hex(openssl_random_pseudo_bytes(40)); 
                        $insert = Teachers::updateOrCreate(['institute_id' => Auth::user()->institute_id,
                         'name'=> $value->name, 'email'=> $value->email,
                         'unique_id'=>$value->reg_no, 'program'=>$value->program, 'department'=>$value->department,
                         'remember_token' => $t,'created_date'=>date('Y-m-d')]); 
                    }else{
                        continue;
                    }				
                }
                $invitation_id_final=DB::table('table_teachers')->orderBy('teacher_id','DESC')->take(1)->pluck('teacher_id');
                $emailJob = (new sendEmailJob($invitation_id_initial,$invitation_id_final,\Auth::user()->institute_name,'Teacher'));
                dispatch($emailJob);
                return redirect()->back()->with('message', 'Teachers Data successfully Inserted');			
            }	
            else{
                return redirect()->back()->with('error', "File does not exists, please upload it.");
            }		
    } catch (Exception $e) {
        return redirect()->back()->with('error', "Some unwanted error occurred.");
        }
	}
}
