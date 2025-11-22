<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ContactoFormulario extends Mailable
{
    use Queueable, SerializesModels;

    public $datos; // Aquí guardaremos la info del formulario

    public function __construct($datos)
    {
        $this->datos = $datos;
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Nuevo Mensaje de Contacto - Meily Ghost: ' . $this->datos['asunto'],
        );
    }

    public function content(): Content
    {
        // Usaremos una vista simple inline para no crear otro archivo si no quieres
        // O creamos la vista emails.contacto abajo.
        return new Content(
            view: 'emails.contacto', 
        );
    }

    public function attachments(): array
    {
        return [];
    }
}