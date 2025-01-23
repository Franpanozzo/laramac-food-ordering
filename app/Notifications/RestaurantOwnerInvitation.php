<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Password;

class RestaurantOwnerInvitation extends Notification
{
    use Queueable;

    public function __construct(public string $restaurantName) {}

    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    public function toMail(object $notifiable): MailMessage
    {
        $url = route('password.reset', [
            'token' => Password::createToken($notifiable),
            'email' => $notifiable->getEmailForPasswordReset(),
        ]);

        return (new MailMessage)
            ->subject(__('We invite you to join :app to manage :restaurant', [
                'restaurant' => $this->restaurantName,
                'app' => config('app.name'),
            ]))
            ->markdown('mail.restaurant.owner-invitation', [
                'setUrl' => $url,
                'restaurant' => $this->restaurantName,
                'requestNewUrl' => route('password.request'),
            ]);
    }
}
