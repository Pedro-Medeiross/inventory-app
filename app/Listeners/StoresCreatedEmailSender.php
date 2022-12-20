<?php

namespace App\Listeners;

use App\Events\StoresCreated as StoresCreatedEvent;
use App\Mail\StoresCreated;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class StoresCreatedEmailSender
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle(StoresCreatedEvent $event)
    {
        $email = new StoresCreated(
            $event->storeID,
            $event->storeName,
            $event->storeAddress,
        );
        Mail::to(Auth::user())->queue($email);
    }
}
