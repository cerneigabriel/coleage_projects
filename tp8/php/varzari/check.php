<?php
include "sql.php";

function getQuestions()
{
    $questions = executeScript("SELECT id, question, input_type_id FROM questions;");

    foreach ($questions as $key => $question) {
        unset($questions[$key]['0']);
        unset($questions[$key]['1']);
        unset($questions[$key]['2']);


        $questions[$key]["input_type"] = executeScript("SELECT name FROM input_types WHERE id = " . $question["input_type_id"] . " LIMIT 1;")[0]["name"];
        $questions[$key]["answers"] = executeScript("SELECT id, answer FROM answers WHERE question_id = " . $question["id"] . ";");
        $questions[$key]["right_answers"] = executeScript("SELECT id FROM answers WHERE question_id = " . $question["id"] . " AND is_right = 1;");

        foreach ($questions[$key]["answers"] as $_key => $answer) {
            unset($questions[$key]["answers"][$_key]["0"]);
            unset($questions[$key]["answers"][$_key]["1"]);
            unset($questions[$key]["answers"][$_key]["2"]);
        }

        $questions[$key]["right_answers"] = array_map(function ($value) {
            return $value["id"];
        }, $questions[$key]["right_answers"]);
    }

    return $questions;
}

function getQuestion($id)
{
    $question = executeScript("SELECT id, question, input_type_id FROM questions WHERE id = $id;")[0];

    unset($question['0']);
    unset($question['1']);
    unset($question['2']);


    $question["input_type"] = executeScript("SELECT name FROM input_types WHERE id = " . $question["input_type_id"] . " LIMIT 1;")[0]["name"];
    $question["answers"] = executeScript("SELECT id, answer FROM answers WHERE question_id = " . $question["id"] . ";");
    $question["right_answers"] = executeScript("SELECT id FROM answers WHERE question_id = " . $question["id"] . " AND is_right = 1;");

    foreach ($question["answers"] as $_key => $answer) {
        unset($question["answers"][$_key]["0"]);
        unset($question["answers"][$_key]["1"]);
        unset($question["answers"][$_key]["2"]);
    }

    $question["right_answers"] = array_map(function ($value) {
        return $value["id"];
    }, $question["right_answers"]);

    return $question;
}

function getAnswer($id)
{
    $answer = executeScript("SELECT id, answer FROM answers WHERE id = $id LIMIT 1;")[0];

    unset($answer["0"]);
    unset($answer["1"]);
    unset($answer["2"]);

    return $answer;
}

if (isset($_POST)) {
    $answers = $_POST;
    $questions = getQuestions();

    $show = [];
    $right_answers = 0;
    $wrong_answers = [];

    if (count($answers) < count($questions)) header("Location: index.php");

    foreach ($answers as $id => $answer) {
        $question = getQuestion((int) $id);

        $right_answers_temp = "<br><strong>" . implode("<br>", array_map(function ($value) {
            return getAnswer($value)["answer"];
        }, $question["right_answers"])) . "</strong>";


        if (gettype($answer) == "string") {
            if ((is_numeric($answer) && in_array((int) $answer, $question["right_answers"])) || in_array($answer, $question["right_answers"])) {
                $right_answers++;
            } else {
                $wrong_answers[] = "<li>Ai gresit raspunsul la intrebarea " . ($id) . ", raspunsul corect este $right_answers_temp</li>";
            }
        } elseif (gettype($answer) == "array" || gettype($answer) == "object") {
            $right = array_intersect($answer, $question["right_answers"]);
            $wrong = array_diff($answer, $question["right_answers"]);

            if (count($right) > 0) {
                if (count($wrong) == 0)
                    $right_answers++;
                elseif (count($right) == count($question["right_answers"]))
                    $wrong_answers[] = "<li>Ai ales " . count($right) . " puncte corecte la intrebarea  " . ($id) . ", dar ai gresit alegand celelalte raspunsuri. Raspunsul corect este $right_answers_temp</li>";
                else
                    $wrong_answers[] = "<li>Ai ales " . count($right) . " puncte corecte la intrebarea  " . ($id) . ", dar ai scapat urmatoarele: $right_answers_temp</li>";
            } else {
                $wrong_answers[] = "<li>Ai gresit raspunsul la intrebarea " . ($id) . ", raspunsul corect este $right_answers_temp</li>";
            }
        }
    }
    array_push($show, "<ul>" . (count($wrong_answers) > 0 ? implode(" ", $wrong_answers) : "&#129395; Felicitari tinere sofer &#129395;") . "</ul>");
    array_push($show, "<h2>$right_answers / " . count($questions) . "</h2>");

    array_push($show, "<ol>" . implode("<br>", array_map(function ($value) {
        return "<li>" . $value["question"] . "<br><ul>" . implode("", array_map(function ($value) {
            return "<li>" . $value["answer"] . "</li>";
        }, $value["answers"])) . "</ul></li>";
    }, $questions)) . "</ol><br><br>");

    echo implode(" ", array_reverse($show));
}
