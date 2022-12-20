<?php

namespace App\Listeners;

use App\Events\ProductsDeleted as ProductsDeletedEvent;
use App\Mail\ProductsDeleted;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class ProductsDeletedEmailSender
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
    public function handle(ProductsDeletedEvent $event)
    {
        $email = new ProductsDeleted(
            store: $event->storeID,
            product: $event->productID,
            productName: $event->productName,
            productPrice: $event->productPrice,
        );
        Mail::to(Auth::user())->queue($email);
    }
}
