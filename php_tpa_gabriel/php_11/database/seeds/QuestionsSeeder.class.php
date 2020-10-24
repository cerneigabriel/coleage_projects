<?php

namespace Database\Seeds;

// Core
use App\Classes\Core\Config;
use App\Classes\Core\Seeds;
use App\Classes\Core\Db;

// Models
use App\Classes\Models\QuestionType;
use App\Classes\Models\Question;
use App\Classes\Models\Answer;

class QuestionsSeeder extends Seeds
{
    public static function run()
    {
        $url = Config::get("quiz.REST_API_URL") . "?apiKey=" . Config::get("quiz.REST_API_KEY");
        $response = static::makeRequest($url);



        return $response;

        // foreach ($response as $key => $value) {
        //     $question = [
        //         "id" => $value["id"],
        //         "question" => addDoubleQuote($value["question"]),
        //         "description" => (is_null($value["description"]) ? "NULL" : addDoubleQuote($value["description"])),
        //         "answers" => (is_null($value["answers"]) ? "NULL" : addDoubleQuote(json_encode($value["answers"]))),
        //         "multiple_correct_answers" => (is_null($value["multiple_correct_answers"]) ? "NULL" : addDoubleQuote($value["multiple_correct_answers"])),
        //         "correct_answers" => (is_null($value["correct_answers"]) ? "NULL" : addDoubleQuote(json_encode($value["correct_answers"]))),
        //     ];

        //     $id = $question["id"];
        //     $same_question = executeScript("SELECT * FROM questions WHERE id = $id");

        //     if (count($same_question) == 0) {
        //         $insert = "INSERT INTO questions(id, question, description, answers, multiple_correct_answers, correct_answers) VALUES";
        //         $values = "(" . implode(", ", $question) . ");";

        //         executeScript($insert . $values, 'insert');
        //     }
        // }
    }

    public static function makeRequest($url)
    {
        $data = false;
        $curl = curl_init();

        if ($data)
            $url = sprintf("%s?%s", $url, http_build_query($data));

        // Optional Authentication:
        curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
        curl_setopt($curl, CURLOPT_USERPWD, "username:password");

        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

        $response = json_decode(curl_exec($curl), true);

        curl_close($curl);

        $response = array_map(function ($value) {
            $multiple = filter_var($value["multiple_correct_answers"], FILTER_VALIDATE_BOOLEAN);

            if (!$multiple) {
                $types = QuestionType::query()->select(["name"])->where("name", "!=", "\"checkbox\"")->get();

                $type = array_map(function ($value) {
                    return $value->name;
                }, $types);

                var_dump($type);
            } else $type = "checkbox";

            $answers = [...json_decode($value["answers"], true)];
            $correct_answers = [...json_decode($value["correct_answers"], true)];

            $answers = array_filter($answers, fn ($value) => (!is_null($value)));
            $correct_answers = array_filter($correct_answers, fn ($value) => (filter_var($value["multiple_correct_answers"], FILTER_VALIDATE_BOOLEAN) === true));

            $answers = array_map(function ($value, $key) use ($correct_answers) {
                return [
                    "answer" => $value,
                    "is_correct" => in_array($key . "_correct", $correct_answers)
                ];
            }, $answers);


            return [
                "question" => (string) $value["question"],
                "answers" => [],
                "type" => $type,
            ];
        }, [...$response]);
        var_dump($response);

        return $response;
    }
}
