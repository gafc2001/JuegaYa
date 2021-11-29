<?php

namespace App\Providers;

use Carbon\Carbon;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        if(config('app.env') === 'production') {
           URL::forceScheme('https');
        }
        Carbon::setLocale('es');
        setlocale(LC_ALL, 'es_MX', 'es', 'ES', 'es_MX.utf8');
    }
}
