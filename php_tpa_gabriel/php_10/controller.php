<?php
// helpers
function number_digits(int $number)
{
    $digits = [];
    while ($number != 0) {
        $digits[] = $number % 10;
        $number = (int)($number / 10);
    }

    return array_reverse($digits);
}

function arrayOfDivisors($number)
{
    $divisors = [];

    for ($i = 1; $i < $number; $i++) {
        if ($number % $i === 0) {
            $divisors[] = $i;
        }
    }
    return $divisors;
}

function compareArrays(array $array_1, array $array_2)
{
    if (count($array_1) !== count($array_2)) return false;

    foreach ($array_1 as $key => $value) {
        if (!in_array($value, $array_2)) return false;
    }
}
//=========

function getQuestionAnswers(int $id)
{
    $answers = file_get_contents("questions.answers.json");

    if ($answers === false) return [];

    $answers = json_decode($answers, true);

    if (gettype($answers) === "array") {
        foreach ($answers as $item) {
            if ($item["question_id"] === $id) return $item;
        }
    }
    return [];
}

function getQuestion(int $id)
{
    $questions = file_get_contents("questions.json");

    if ($questions === false) return [];

    $questions = json_decode($questions, true);

    if (gettype($questions) === "array") {
        foreach ($questions as $item) {
            if ($item["id"] === $id) return $item;
        }
    }
    return [];
}

function getQuestions()
{
    $questions = file_get_contents("questions.json");

    if ($questions === false) return [];

    $questions = json_decode($questions, true);

    if (gettype($questions) === "array") return $questions;
    return [];
}

function grid_test(array $request)
{
    if (isset($request) && count($request) > 0) {
        $questions = getQuestions();

        // Report
        $total_questions = count($questions);
        $correct_answers = 0;
        $wrong_answers = 0;
        $questions_report = [];


        if (count($questions) !== count($request)) {
            return array(
                "errors" => [
                    "title" => "Error",
                    "value" => "Completeaza toate intrebarile"
                ]
            );
        }

        foreach ($request as $key => $item) {
            $id = (int) explode("_", $key)[1];
            $question = getQuestion($id);
            $answers = getQuestionAnswers($id);

            $questions_report["question_$id"] = [
                "title" => $question["question"],
            ];

            switch ($question['type']) {
                case "text":
                    if (isset($item["answer"]) && in_array($item["answer"], $answers["answers"])) {
                        $correct_answers++;
                        $questions_report["question_$id"]["value"] = "<span style=\"color: green;\">Right answer</span>";
                    } else $questions_report["question_$id"]["value"] = "<span style=\"color: red;\">Wrong answer</span><span style=\"color: DARKKHAKI;\"> !The right answer" . (count($answers["answers"]) > 1 ? "s" : "") . " is " . implode(", ", $answers["answers"]) . "</span>";

                    break;
                case "radio" || "select":
                    if (isset($item["answer"]) && in_array((int) $item["answer"], $answers["answers"])) {
                        $correct_answers++;
                        $questions_report["question_$id"]["value"] = "<span style=\"color: green;\">Right answer</span>";
                    } else $questions_report["question_$id"]["value"] = "<span style=\"color: red;\">Wrong answer</span><span style=\"color: DARKKHAKI;\"> !The right answer" . (count($answers["answers"]) > 1 ? "s" : "") . " is " . implode(", ", $answers["answers"]) . "</span>";

                    break;
                case "checkbox":
                    if (isset($item["answers"])) {
                        for ($i = 0; $i < count($item["answers"]); $i++)
                            $item["answers"][$i] = (int) $item["answers"][$i];

                        $correct = 0;

                        foreach ($item["answers"] as $key => $value) {
                            if (in_array($value, $answers["answers"])) {
                                $correct++;
                            }
                        }

                        $percent_of_correctness = ($correct * 100) / count($answers["answers"]);

                        if ($percent_of_correctness === 100) {
                            if (count($item["answers"]) === count($answers["answers"])) {
                                $correct_answers++;
                                $questions_report["question_$id"]["value"] = "<span style=\"color: green;\">Right answer</span><span style=\"color: darkviolet;\"> Percentage of correctness: " . number_format($percent_of_correctness, 2) . "</span>";
                            }
                        }

                        if (($percent_of_correctness < 100 && $percent_of_correctness >= 0) || count($item["answers"]) !== count($answers["answers"])) {
                            $questions_report["question_$id"]["value"] = "<span style=\"color: red;\">Wrong answer</span><span style=\"color: darkviolet;\"> Percentage of correctness: " . number_format($percent_of_correctness, 2) . "</span><span style=\"color: DARKKHAKI;\"> !The right answer" . (count($answers["answers"]) > 1 ? "s" : "") . " is " . implode(", ", $answers["answers"]) . "</span>";
                        }
                    }
                    break;
            }
        }

        $wrong_answers = $total_questions - $correct_answers;

        $return = array_merge(array(
            "questions_answered" => [
                "title" => "$correct_answers out of $total_questions are correct",
                "value" => ""
            ]
        ), $questions_report);

        return $return;
    }

    return array();
}

$headers = apache_request_headers();
if (isset($headers["function_name"])) {
    $private_functions = ["getQuestionAnswers"];

    if (!in_array($headers["function_name"], $private_functions)) {
        echo json_encode(call_user_func($headers["function_name"], $_POST));
    }
}
