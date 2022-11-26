<?php

namespace App\Providers;

use App\Repository\EloquentProductsRepository;
use App\Repository\ProductsRepository;
use Illuminate\Support\ServiceProvider;

class ProductsRepositoryProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            ProductsRepository::class,
            EloquentProductsRepository::class
        );
    }
}
