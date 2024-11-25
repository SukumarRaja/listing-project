<?php

namespace App\Providers;

use App\Events\CreateOrder;
use App\Listeners\CreateOrderListener;
use Event;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Event::listen(
            CreateOrder::class,
            CreateOrderListener::class
        );
    }
}
