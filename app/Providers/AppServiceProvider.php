<?php

namespace App\Providers;

use App\Services\Giphy;
use GPH\Api\DefaultApi;
use Illuminate\Cache\Repository;
use Illuminate\Foundation\Application;
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
        $this->app->singleton(Giphy::class, function (Application $app) {
            return new Giphy($app->make(DefaultApi::class), $app->make(Repository::class), config('giphy.key'));
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
