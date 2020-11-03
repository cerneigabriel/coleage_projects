<?php

class ErrorsController
{
    public function error404(array $request)
    {
        return View::view("errors.404", [
            "title" => "404 - Page Not Found"
        ])->render();
    }
}
