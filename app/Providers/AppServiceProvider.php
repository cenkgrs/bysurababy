<?php

namespace App\Providers;

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
        if ($_SERVER['REMOTE_ADDR'] !== '127.0.0.1') {
            $this->app->bind('path.public', function() {
                return realpath('/home/ruf254evfebs/public_html');
            });
        }
       
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
