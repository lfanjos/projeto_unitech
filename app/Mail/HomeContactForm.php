<?php

namespace App\Mail;

use http\Env\Request;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class HomeContactForm extends Mailable
{
    private $data;
    private $dateTime;
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($request, \DateTime $dateTime)
    {
        $this->data = $request->all();
        $this->dateTime = $dateTime->format('H:i:s \d\o \d\i\a d/m/Y ');
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $data = $this->data;
        $dateTime = $this->dateTime;
        $this->from($this->data['email'], $this->data['name']);
        $this->subject($this->data['subject']);
        $this->to('unitech@luving.com.br','Contato');
        return $this->view('mail.homeContactForm', compact('data', 'dateTime'));
    }
}
