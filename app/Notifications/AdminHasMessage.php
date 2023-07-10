<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class AdminHasMessage extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(
        public $subject = null,
        public $greeting = null,
        public $content = null,
    ) {
        $this->subject = $this->subject ?? 'پیام جدید دارید';
        $this->greeting = $this->greeting ?? 'سلام ' . config('admin.fa-name') . ' عزیز، امیدوارم حالت خوب باشه!';
        $this->content = $this->content ?? 'شما یک پیام جدید دارید!';
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->from(config('mail.from.address'), config('mail.from.name'))
            ->subject($this->subject)
            ->view('emails.inform-admin', [
                'subject' => $this->subject,
                'greeting' => $this->greeting,
                'content' => $this->content,
                'messageID' => $notifiable->id,
            ]);
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
