<?php

namespace App\Listeners;

use App\Events\ProductsEdited as ProductsEditedEvent;
use App\Mail\ProductsEdited;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class ProductsEditedEmailSender
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
    public function handle(ProductsEditedEvent $event)
    {
        $email = new ProductsEdited(
            store: $event->storeID,
            product: $event->productID,
            productName: $event->productName,
            productPrice: $event->productPrice,
        );
        Mail::to(Auth::user())->queue($email);
    }
}
