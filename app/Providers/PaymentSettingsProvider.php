<?php

namespace App\Providers;

use App\Services\PaymentSettingService;
use Illuminate\Support\ServiceProvider;

class PaymentSettingsProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->singleton(PaymentSettingService::class, function () {
            return new PaymentSettingService();
        });
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        $paymentService = $this->app->make(PaymentSettingService::class);
        $paymentService->setGlobalSettings();
    }
}
