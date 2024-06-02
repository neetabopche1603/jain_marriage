<?php

namespace App\Listeners;

use App\Events\UserRegisteredEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;
use App\Mail\UserRegisterdWelcomeMail;

class UserWelcomeEmailListener  implements ShouldQueue
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    // public function handle(object $event): void
    // {

    // }

    public function handle(UserRegisteredEvent $event)
    {
        Mail::to($event->user->email)->send(new UserRegisterdWelcomeMail ($event->user));
    }
}
