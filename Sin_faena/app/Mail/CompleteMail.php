<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class CompleteMail extends Mailable
{
    use Queueable, SerializesModels;

    public $details;
    public $attachments;

    public function __construct($details, $attachments)
    {
        $this->details = $details;
        $this->attachments = $attachments;
    }

    public function build()
    {
        $email = $this->view('emails.contact')
                      ->subject($this->details['subject'])
                      ->with('details', $this->details);

        // Adjuntar archivos
        foreach ($this->attachments as $filePath) {
            $email->attach($filePath);
        }

        return $email;
    }
}
    