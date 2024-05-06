<?php

namespace App\Mail;

use App\Models\Room;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Envelope;

class SampleEmail extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;
    private $fromEmail;
    private $subjectEmail;
    private $name;
    public function __construct($name)
    {
        $this->name = $name;
    }

    public function build()
    {
        return $this->subject("Test send")
                    ->from('admin@laravel.test', 'Admin')
                    ->view('emails.sample')->with(['name' => $this->name]);
    }

}
