<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use App\Mail\Invitation;
use Illuminate\Support\Facades\Mail;
use DB;
use App\Students;
use App\Teachers;

class sendEmailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    protected $invitation_id_initial,$invitation_id_final, $institute_name, $user_type;
    public function __construct($invitation_id_initial,$invitation_id_final, $institute_name, $user_type)
    {
        //
        $this->invitation_id_initial=$invitation_id_initial;
        $this->invitation_id_final=$invitation_id_final;
        $this->institute_name=$institute_name;
        $this->user_type=$user_type;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        //
        if($this->user_type=='Teacher')
        $emails=Teachers::whereBetween('teacher_id',array(($this->invitation_id_initial),$this->invitation_id_final))->pluck('email');
        else if($this->user_type=='Student')
        $emails=Students::whereBetween('student_id',array(($this->invitation_id_initial),$this->invitation_id_final))->pluck('email');

        $count=$emails->count();

        if($count>0){
            
            foreach($emails as $key => $email)
            {
                Mail::to($email)->send(new Invitation($this->institute_name, $this->user_type));
            }
        }else{
            Mail::to('rishabhgoel9797@gmail.com')->send(new Invitation($this->institute_name));
        }
    }
}
