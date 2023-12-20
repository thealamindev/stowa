<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class NewadminMail extends Mailable
{
    use Queueable, SerializesModels;
    // public $created_at ="";
    public $email ="";
    public $password ="";
    /**
     * Create a new message instance.
     */
    public function __construct($email,$password)
    {
        // $this -> created_by = $createor_name;
        $this -> email = $email;
        $this -> password = $password;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Newadmin Mail',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'mail.newadmin',with: [
        //    'created_by'=>$this -> created_by,
           'email'=>$this -> email,
           'password'=> $this -> password,
            ],

        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
