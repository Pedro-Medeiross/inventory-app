<?php

namespace App\Listeners;

use App\Mail\ProductsCreated;
use App\Events\ProductsCreated as ProductsCreatedEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class ProductsCreatedEmailSender
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
    public function handle(ProductsCreatedEvent $event)
    {
        $email = new ProductsCreated(
            store: $event->storeID,
            product: $event->productID,
            productName: $event->productName,
            productPrice: $event->productPrice,
        );
        Mail::to(Auth::user())->queue($email);
    }
}
