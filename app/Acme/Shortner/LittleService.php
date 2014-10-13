<?php namespace Acme\Shortner;

use Acme\Exceptions\NonExistentHashException;
use Acme\Repositories\LinkRepositoryInterface;
use Acme\Utilities\UrlHasher;


class LittleService {

    protected $linkRepo;

    protected $urlHasher;

    /**
     * @param LinkRepositoryInterface $linkRepo
     * @param UrlHasher $urlHasher
     */
    function __construct(LinkRepositoryInterface $linkRepo, UrlHasher $urlHasher)
    {
        $this->linkRepo = $linkRepo;
        $this->urlHasher = $urlHasher;
    }


    public function make($url)
    {
        $link = $this->linkRepo->byUrl($url);

        if ($link) return $link->hash;

        $hash = $this->makeHash($url);

        return $hash;

    }

    /**
     * @param $hash
     * @return mixed
     * @throws \Acme\Exceptions\NonExistentHashException
     */
    public function getUrlByHash($hash)
    {
        $link = $this->linkRepo->byHash($hash);

        if(! $link)
        {
            throw new NonExistentHashException;
        }
        return $link->url;
    }

    private function makeHash($url)
    {
        $hash = $this->urlHasher->make($url);

        $data = compact('url', 'hash');

        \Event::fire('link.creating', [$data]);
        $this->linkRepo->create($data);

        return $hash;
    }

} 