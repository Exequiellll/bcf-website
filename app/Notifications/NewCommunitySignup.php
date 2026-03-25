<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\Models\CommunitySignup;

class NewCommunitySignup extends Notification implements ShouldQueue
{
    use Queueable;

    /**
     * The number of times the job may be attempted.
     *
     * @var int
     */
    public $tries = 3;

    /**
     * The community signup instance.
     *
     * @var \App\Models\CommunitySignup
     */
    protected $signup;

    /**
     * Create a new notification instance.
     */
    public function __construct(CommunitySignup $signup)
    {
        $this->signup = $signup;
        $this->onQueue('emails');
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        $message = (new MailMessage)
            ->subject('New Community Signup - ' . $this->signup->name)
            ->line('A new person has signed up for the vibrant community!');

        $message->line('**Name:** ' . $this->signup->name);
        
        if ($this->signup->email) {
            $message->line('**Email:** ' . $this->signup->email);
        }
        
        if ($this->signup->phone) {
            $message->line('**Phone:** ' . $this->signup->phone);
        }
        
        $message->action('View in Admin', url('/admin/community-signups'));
        
        return $message;
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
