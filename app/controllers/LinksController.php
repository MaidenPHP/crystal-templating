<?php

use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Acme\Validation\ValidationException;
use Acme\Exceptions\NonExistentHashException;


class LinksController extends \BaseController {

    /**
     * Show the form for creating a new link
     *
     * @return Response
     */
    public function create()
    {
        return View::make('links.create');
    }

    /**
     * Store a newly created link in storage.
     *
     * @return Response
     */
    public function store()
    {
        try
        {
            $hash = Little::make(Input::get('url'));
        }
        catch (ValidationException $e)
        {
            return Redirect::home()->withErrors($e->getErrors())->withInput();
        }

        return Redirect::home()->with([
            'flash_message' => 'here you go! ' . link_to($hash),
            'hashed'        => $hash
        ]);

    }

    /**
     * Gets the url via the $hash and redirects it to that url
     *
     * @param $hash
     * @return mixed
     */
    public function translateHash($hash)
    {
        try
        {
            $url = $url = Little::getUrlByHash($hash);

            return Redirect::to($url);
        }
        catch (NonExistentHashException $e)
        {
            return Redirect::home()->withFlashMessage('Sorry could not find the hash');
        }
    }

    /**
     * Display the specified link.
     *
     * @param  int $id
     * @return Response
     */
    public function show($id)
    {
        $link = Link::findOrFail($id);

        return View::make('links.show', compact('link'));
    }

}
