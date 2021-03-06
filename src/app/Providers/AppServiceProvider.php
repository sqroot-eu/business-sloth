<?php

namespace App\Providers;

use App\Services\TextGraderService;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // There is a TLS-terminating proxy in front of us.
        // Force laravel to accept the fact and generate HTTPS links
        URL::forceScheme('https');
        $this->app['request']->server->set('HTTPS','on');
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(TextGraderService::class, function ($app) {
            return new TextGraderService(config('sloth.dictionaries'));
        });
    }
}
