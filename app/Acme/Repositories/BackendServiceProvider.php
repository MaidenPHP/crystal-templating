<?php namespace Acme\Shortner\Repositories;

use Illuminate\Support\ServiceProvider;


class BackendServiceProvider extends ServiceProvider {

    public function register()
    {
        $this->app->bind(
            'Acme\Shortner\Repositories\LinkRepositoryInterface',
            'Acme\Shortner\Repositories\DbLinkRepository'
        );
    }
}