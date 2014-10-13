<?php namespace Acme\Utilities;

class UrlHasher {

    public function make($url)
    {
        return \Str::random(5);
    }

} 