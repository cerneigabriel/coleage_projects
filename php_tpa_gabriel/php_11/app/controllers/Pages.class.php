<?php

namespace App\Controllers;

// Core
use App\Classes\Core\Config;
use App\Classes\Core\View;
use App\Classes\Core\Session;

// Models
use App\Classes\Models\Question;

class Pages
{
    public function index()
    {
        $questions = Question::query()->random()->limit(Config::get("quiz.questions_count"))->get();

        Session::setItem("quiz", array_map(fn ($value) => ($value->id), $questions));

        return View::view("index", [
            "questions" => $questions
        ])->render();
    }

    public function page404()
    {
        return View::view("errors.404")->render();
    }
}
