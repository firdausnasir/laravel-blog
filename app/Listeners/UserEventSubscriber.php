<?php

namespace App\Listeners;

use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;

class UserEventSubscriber
{
    public function handleRegisteredUser(Registered $event)
    {
        (new SendEmailVerificationNotification())->handle($event);
    }

    public function subscribe($events): array
    {
        return [
            Registered::class => 'handleRegisteredUser',
        ];
    }
}
