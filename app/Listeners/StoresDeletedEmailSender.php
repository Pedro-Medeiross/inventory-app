<?php

namespace App\Listeners;

use App\Events\StoresDeleted as StoresDeletedEvent;
use App\Mail\StoresCreated;
use App\Mail\StoresDeleted;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class StoresDeletedEmailSender
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
    public function handle(StoresDeletedEvent $event)
    {
        $email = new StoresDeleted(
            $event->storeID,
            $event->storeName,
            $event->storeAddress,
        );
        Mail::to(Auth::user())->queue($email);
    }
}
