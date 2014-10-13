<?php namespace Acme\Repositories;

use Illuminate\Support\ServiceProvider;


class BackendServiceProvider extends ServiceProvider {

    public function register()
    {
        $this->app->bind(
            'Acme\Repositories\LinkRepositoryInterface',
            'Acme\Repositories\DbLinkRepository'
        );
    }
}