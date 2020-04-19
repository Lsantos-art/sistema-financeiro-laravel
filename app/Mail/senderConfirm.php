<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class senderConfirm extends Mailable
{
    use Queueable, SerializesModels;
    private $mail;
    private $mailName1;
    private $mailName2;
    private $myMail;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($mail, $myMail, $mailName1, $mailName2)
    {
        $this->mail = $mail;
        $this->myMail = $myMail;
        $this->mailName1 = $mailName1;
        $this->mailName2 = $mailName2;
        // dd($mail, $mailName1, $myMail, $mailName2);
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $this->subject('Transação realizada com sucesso!');
        $this->to($this->mail, $this->mailName1);
        return $this->markdown('admin.mail.mailSender', [
            'userSender' => $this->mailName2,
            'user' => $this->mailName1
        ]);
    }
}
