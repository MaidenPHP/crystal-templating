<?php namespace Acme\Shortner\Repositories;

interface LinkRepositoryInterface {

    public function byHash($hash);
} 