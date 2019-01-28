<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ProjectCreated extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $project;

    public $foo = "bar"; //Anything public here can be accessed in mail

    public function __construct($project)
    {
//        Pass through anything I need to use in the email in this constructor
        $this->project = $project;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('mail.project-created');
    }
}

//Used in LFS30 - Mailables
//Created with artisan make:mail ProjectCreated --markdown="emails.project-created"