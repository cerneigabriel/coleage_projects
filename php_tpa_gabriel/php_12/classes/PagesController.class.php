<?php

class PagesController
{
    public function index(array $request)
    {
        return View::view("pages.index", [
            "title" => "Home"
        ])->render();
    }
}
