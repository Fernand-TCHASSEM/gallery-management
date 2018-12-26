<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Extensions\Exceptions\Handler;
use Illuminate\Contracts\Debug\ExceptionHandler;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->bind(
            ExceptionHandler::class,
            Handler::class
        );
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
