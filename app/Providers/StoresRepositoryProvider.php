<?php

namespace App\Providers;

use App\Repository\EloquentProductsRepository;
use App\Repository\EloquentStoresRepository;
use App\Repository\StoresRepository;
use Illuminate\Support\ServiceProvider;

class StoresRepositoryProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            StoresRepository::class,
            EloquentStoresRepository::class
        );
    }
}
