<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Attachment;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class OrderConfirmedEmail extends Mailable
{
    use Queueable, SerializesModels;
    public $array; 
    public $file;
    public $path;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($array, $path, $file)
    {
         $this->view($array['view'])
         ->subject($array['subject'])
         ->from($array['from'])
         ->with([
            'order' => $array['order'], 
            ]);
            $this->file = $file;
            $this->path = $path;
    }

    /**
     * Get the message envelope.
     *
     * @return \Illuminate\Mail\Mailables\Envelope
     */
    public function envelope()
    {
        return new Envelope(
            subject: 'Your order has been confirmed.',
        );
    }

    /**
     * Get the message content definition.
     *
     * @return \Illuminate\Mail\Mailables\Content
     */
    public function content()
    {
        return new Content(
            view: 'emails.invoice',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array
     */
    public function attachments()
    {
        return [
            Attachment::fromPath($this->path)
                ->as($this->file)
                ->withMime('application/pdf'),  
        ];
    }
}
