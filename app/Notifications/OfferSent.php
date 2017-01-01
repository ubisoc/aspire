<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class OfferSent extends Notification
{
    use Queueable;

    protected $application;
    protected $user;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Application $application, User $user)
    {
        $this->application = $application;
        $this->user = $user;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database'];
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
                    ->line('An offer has been sent to the following candidate:')
                    ->line('Name: ' . $candidateName)
                    ->line('The offer was sent by:')
                    ->line('Employee: ' . $employeeName)
                    ->line('For the following role:')
                    ->line('Role: ' . $role->title)
                    ->action('View Offer', '/applications/' . $this->application->id . '/show')
                    ->line('Thank you for using Aspire!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return array_merge($this->application->toArray(), $this->user->toArray());
    }
}
