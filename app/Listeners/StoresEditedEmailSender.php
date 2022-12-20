<?php

namespace App\Listeners;

use App\Events\StoresEdited as StoresEditedEvent;
use App\Mail\StoresCreated;
use App\Mail\StoresEdited;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class StoresEditedEmailSender
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
    public function handle(StoresEditedEvent $event)
    {
        $email = new StoresEdited(
            $event->storeID,
            $event->storeName,
            $event->storeAddress,
        );
        Mail::to(Auth::user())->queue($email);
    }
}
