<?php

namespace App\Providers;

use App\Repositories\EloquentSellerRepository;
use App\Repositories\SellerRepositoryInterface;
use App\Services\SellerService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        if ($this->app->environment('local')) {
            $this->app->register(\Laravel\Telescope\TelescopeServiceProvider::class);
            $this->app->register(TelescopeServiceProvider::class);
            $this->app->bind(SellerRepositoryInterface::class, EloquentSellerRepository::class);

            $this->app->bind(SellerService::class, function ($app) {
                return new SellerService($app->make(SellerRepositoryInterface::class));
            });

        }
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
