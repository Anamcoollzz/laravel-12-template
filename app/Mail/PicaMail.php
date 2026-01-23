<?php

namespace App\Mail;

use App\Models\Pica;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class PicaMail extends Mailable
{
    use Queueable, SerializesModels;

    private Pica $pica;

    /**
     * Create a new message instance.
     */
    public function __construct(Pica $pica)
    {
        $this->pica = $pica;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Notifikasi PICA',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'stisla.emails.pica',
            with: [
                'judul_pica' => $this->pica->title ?? $this->pica->notes,
                'kategori' => $this->pica->category->name,
                'status' => $this->pica->status->name,
                'tahun' => date('Y'),
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
