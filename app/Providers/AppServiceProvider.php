<?php

namespace App\Providers;

use Illuminate\Support\Facades\URL;
use Illuminate\Pagination\Paginator;
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
        //
        Paginator::useTailwind();


        if (config('app.env') === 'local') {
            URL::forceScheme('http');
        } elseif (config('app.env') === 'local') {
            URL::forceScheme('https');
        }
    }
}
