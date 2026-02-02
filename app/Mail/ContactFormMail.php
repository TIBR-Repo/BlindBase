<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ContactFormMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
    public function __construct(
        public array $formData
    ) {}

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        $subjects = [
            'general' => 'General Enquiry',
            'quote' => 'Quote Request',
            'trade' => 'Trade Account Enquiry',
            'order' => 'Order Query',
            'compliance' => 'Compliance Documentation Request',
            'other' => 'Contact Form Message',
        ];

        $subjectLine = $subjects[$this->formData['subject']] ?? 'Contact Form Message';

        return new Envelope(
            subject: "BlindBase: {$subjectLine} from {$this->formData['name']}",
            replyTo: [$this->formData['email']],
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.contact-form',
        );
    }

    /**
     * Get the attachments for the message.
     */
    public function attachments(): array
    {
        return [];
    }
}
