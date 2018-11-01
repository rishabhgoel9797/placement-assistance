<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class TeacherInvitation extends Mailable
{
    use Queueable, SerializesModels;
    public $institute_name;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($insti_name)
    {
        //
        $this->institute_name=$insti_name;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
         return $this->from('rishabhgoel9797@gmail.com', $this->institute_name . " Invitation.")->view('emails.teacherInvite', ['institute_name' => $this->institute_name])->subject('Placement Invitation from Placera');
    }
}
