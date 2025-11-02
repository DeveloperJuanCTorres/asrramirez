<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class Contactanos extends Mailable
{
    use Queueable, SerializesModels;
    public $data;
    
    public function __construct($data)
    {
        $this->data = $data;
    }

    public function build()
    {
        $email = $this->view('email.contactanos')
                ->subject($this->data['subject'] ?? 'Nuevo mensaje de Contáctanos') // Asunto dinámico
                ->from(config('mail.from.address'), config('mail.from.name'));     // remitente seguro
       

        return $email;
    }
}
