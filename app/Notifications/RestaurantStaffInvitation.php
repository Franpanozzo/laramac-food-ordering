<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Password;

class RestaurantStaffInvitation extends Notification
{
    use Queueable;

    public function __construct(public string $restaurantName) {}

    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->subject(__('You have been invited to :restaurant staff members on :app', [
                'restaurant' => $this->restaurantName,
                'app' => config('app.name'),
            ]))
            ->markdown('mail.restaurant.staff-invitation', [
                'setUrl' => $this->resetUrl($notifiable),
                'restaurant' => $this->restaurantName,
                'requestNewUrl' => route('password.request'),
            ]);
    }

    protected function resetUrl($notifiable): string
    {
        return url(route('password.reset', [
            'token' => Password::createToken($notifiable),
            'email' => $notifiable->getEmailForPasswordReset(),
        ], false));
    }

    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
