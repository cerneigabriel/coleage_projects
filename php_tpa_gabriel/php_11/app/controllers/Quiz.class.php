<?php

namespace App\Controllers;

// Core
use App\Classes\Core\View;
use App\Classes\Core\Session;
use App\Classes\Core\Redirect;
use App\Classes\Core\Config;

// Models
use App\Classes\Models\Question;
use App\Classes\Models\Answer;

class Quiz
{
    protected static $responseTemplate = [
        "questions" => [],
        "score" => [
            "correct" => 0,
            "total" => 0,
            "percent" => 0
        ]
    ];

    public function response()
    {
        if (Session::hasItem("quiz_response") && !Session::hasItem("errors"))
            $response = Session::getItem("quiz_response");
        else return Redirect::to("?page=index");

        Session::removeItem("quiz_response");

        return View::view("quiz.response", $response)->render();
    }

    public function calculate(array $request)
    {
        $response = self::$responseTemplate;
        $errors = [];
        $quiz = Session::hasItem("quiz") ? Session::getItem("quiz") : false;
        $request = count($request) > 0 ? $request : false;


        if (!$quiz) $errors[] = "The test wasn't initialized.";
        if (!$request) $errors[] = "Something went wrong.";

        $request = array_filter($request, fn ($value) => (is_array($value) ? array_filter($value, fn ($value) => ($value !== "")) : $value !== ""));

        $total_questions_count = Config::get("quiz.questions_count");
        $current_quetions_count = count($request);

        if ($current_quetions_count < $total_questions_count) $errors[] = "Make sure you answered all questions.";

        if ($current_quetions_count > $total_questions_count || ($current_quetions_count === $total_questions_count && $quiz !== array_keys($request))) $errors[] = "The questions do not correspond to the initialized test";

        if (count($errors) === 0) {
            foreach ($request as $question_id => $user_answers) {
                $question = Question::find($question_id);

                if (!$question) {
                    $errors[] = "Question $question_id doesn't exist.";
                    break;
                }

                $correct_answers = $question->correctAnswers();
                $report = [
                    "question" => $question,
                    "user_answers" => [],
                    "score" => [
                        "correct" => 0,
                        "total" => count($correct_answers),
                        "percent" => 0
                    ]
                ];

                foreach ($correct_answers as $correct_answer) {
                    switch ($question->type()->name) {
                        case "checkbox":
                            $report["user_answers"] = array_map(fn ($value) => ((int) $value), $user_answers);
                            if (in_array($correct_answer->id, $report["user_answers"])) $report["score"]["correct"]++;
                            break;

                        case "radio":
                        case "select":
                            if ($correct_answer->id === (int) $user_answers) $report["score"]["correct"]++;
                            $report["user_answers"][] = (int) $user_answers;
                            break;

                        case "text":
                            if ($correct_answer->answer === $user_answers) $report["score"]["correct"]++;
                            $report["user_answers"][] = $user_answers;
                            break;
                    }
                }

                $report["score"]["percent"] = bcadd(($report["score"]["correct"] * 100) / $report["score"]["total"], 0, 2);

                if ($report["score"]["correct"] === $report["score"]["total"] && count($report["user_answers"]) === $report["score"]["total"])
                    $response["score"]["correct"]++;

                $response["questions"][] = $report;
            }

            $response["score"]["total"] = count($response["questions"]);

            if ($response["score"]["total"] > 0)
                $response["score"]["percent"] = bcadd(($response["score"]["correct"] * 100) / $response["score"]["total"], 0, 2);

            Session::setItem("quiz_response", $response);
        }

        if (count($errors) > 0) {
            Session::setItem("errors", $errors);

            return Redirect::to("?page=index");
        }


        return Redirect::to("?page=quiz.response");
    }
}
