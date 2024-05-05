<?php

namespace App\Listeners;

use App\Events\RegisterEvent;
use App\Mail\WelcomeMail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SendMail
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {

    }

    /**
     * Handle the event.
     */
    public function handle(RegisterEvent $event): void
    {
     Mail::to($event->user->email)->queue(new WelcomeMail());

    }
}
