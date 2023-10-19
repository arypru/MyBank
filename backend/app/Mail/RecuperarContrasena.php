<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;


class RecuperarContrasena extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
    public function __construct($nombre, $codigo)
    {
        $this->nombre = $nombre;
        $this->codigo = $codigo;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Recuperar Contraseña',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        $nombre = $this->nombre;
        $codigo = $this->codigo;

        $css =  '<script src="https://cdn.tailwindcss.com"></script>';

        return new Content(
            view: 'email',
            with: ['nombre' => $nombre, 'codigo' => $codigo, 'css' => $css],
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
