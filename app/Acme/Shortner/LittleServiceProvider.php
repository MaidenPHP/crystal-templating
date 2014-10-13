<?php namespace Acme\Shortner;

use Illuminate\Support\ServiceProvider;


class LittleServiceProvider extends ServiceProvider {

    public function register()
    {
        $this->app->bind('little', 'Acme\Shortner\LittleService');
    }
} 