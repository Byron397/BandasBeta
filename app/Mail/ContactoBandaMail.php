<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ContactoBandaMail extends Mailable
{
    use Queueable, SerializesModels;

    public $datosCorreo;

    public function __construct($datosCorreo)
    {
        $this->datosCorreo = $datosCorreo;
    }

    public function build()
    {
        return $this->view('emails.contacto_banda')
            ->subject('Correo de contacto de la banda');
    }
}
