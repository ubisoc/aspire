<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class OfferReceived extends Notification
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
        $company = $this->user->companyData()->firstOrFail()->name;
        $role = $this->application->role()->firstOrFail();
        return (new MailMessage)
                    ->line('You have received an offer from ' . $company . ' for the following role:')
                    ->line('Role: ' . $role->title)
                    ->action('View Role', '/roles/' . $role->id . '/show')
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
