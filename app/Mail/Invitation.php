<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class Invitation extends Mailable
{
    use Queueable, SerializesModels;
    public $institute_name;
    public $user_type;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($insti_name, $user_type)
    {
        //
        $this->institute_name=$insti_name;
        $this->user_type=$user_type;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
         return $this->from('rishabhgoel9797@gmail.com', $this->institute_name . " Invitation.")->view('emails.invite', ['institute_name' => $this->institute_name, 'user_type'=>$this->user_type])->subject('Placement Invitation from Placera');
    }
}
