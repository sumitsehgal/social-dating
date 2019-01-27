<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class Contacts extends Mailable
{
    use Queueable, SerializesModels;

    public $data = [];

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->to('shanugoyal96@gmail.com')
                    ->from($this->data['email'])
                    ->cc('theprofessional1992@gmail.com')
                    ->view('emails.contacts')
                    ->with([
                        'data' => $this->data,
                    ]);
    }
}
