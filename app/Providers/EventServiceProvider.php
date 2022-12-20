<?php

namespace App\Providers;

use App\Events\ProductsCreated;
use App\Events\ProductsDeleted;
use App\Events\ProductsEdited;
use App\Events\StoresCreated;
use App\Events\StoresDeleted;
use App\Events\StoresEdited;
use App\Listeners\ProductsCreatedEmailSender;
use App\Listeners\ProductsDeletedEmailSender;
use App\Listeners\ProductsEditedEmailSender;
use App\Listeners\StoresCreatedEmailSender;
use App\Listeners\StoresDeletedEmailSender;
use App\Listeners\StoresEditedEmailSender;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event to listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        StoresCreated::class => [
            StoresCreatedEmailSender::class,
        ],
        StoresEdited::class => [
            StoresEditedEmailSender::class,
        ],
        StoresDeleted::class => [
            StoresDeletedEmailSender::class,
        ],
        ProductsCreated::class => [
            ProductsCreatedEmailSender::class,
        ],
        ProductsEdited::class => [
            ProductsEditedEmailSender::class,
        ],
        ProductsDeleted::class => [
            ProductsDeletedEmailSender::class,
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Determine if events and listeners should be automatically discovered.
     *
     * @return bool
     */
    public function shouldDiscoverEvents()
    {
        return false;
    }
}
