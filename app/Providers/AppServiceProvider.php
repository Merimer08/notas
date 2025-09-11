<?php

namespace App\Providers;

// 1. AÑADE ESTA LÍNEA PARA IMPORTAR LA CLASE URL
use Illuminate\Support\Facades\URL;
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
        // 2. ESTE CÓDIGO AHORA FUNCIONARÁ CORRECTAMENTE
        if ($this->app->environment('production')) {
            URL::forceScheme('https');
        }
    }
}