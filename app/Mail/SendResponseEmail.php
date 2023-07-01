<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class SendResponseEmail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(
        public $subject,
        public $content,
        public $greeting = null,
        public $intro = null,
        public $farewell = null,
        public $signature = null,
    )
    {
        $this->greeting = $this->greeting ?? 'سلام دوست عزیز، امیدوارم حالت خوب باشه!';
        $this->intro = $this->intro ?? 'ممنون که بهم پیام دادی. این ایمیل رو برای پاسخ به پیام شما فرستادم.';
        $this->farewell = $this->farewell ?? 'اگر حرف دیگه‌ای داشتی حتما بهم بگو!';
        $this->signature = $this->signature ?? config('app.name');
    }

    /**
     * Get the message envelope.
     *
     * @return \Illuminate\Mail\Mailables\Envelope
     */
    public function envelope()
    {
        return new Envelope(
            from: new Address(config('mail.from.address'), config('mail.from.name')),
            subject: $this->subject,
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
            view: 'emails.send-response',
            with: [
                'content' => $this->content,
                'greeting' => $this->greeting,
                'intro' => $this->intro,
                'farewell' => $this->farewell,
                'signature' => $this->signature,
            ],
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array
     */
    public function attachments()
    {
        return [];
    }
}
