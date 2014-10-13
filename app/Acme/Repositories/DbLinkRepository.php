<?php namespace Acme\Shortner\Repositories;

class DbLinkRepository implements LinkRepositoryInterface {

    public function byHash($hash)
    {
        return Link::whereHash($hash)->first();
    }

} 