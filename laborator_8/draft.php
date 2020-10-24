<?php
function fillDatabase()
{
    $url = "https://quizapi.io/api/v1/questions?apiKey=xspKnMwL8zzAAsQTbdDAhaCaRRUiu2XC8acFGESm";
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

    $response = array_filter($response, function ($value) {
        return filter_var($value["multiple_correct_answers"], FILTER_VALIDATE_BOOLEAN) === true;
    });

    var_dump(count($response));

    foreach ($response as $key => $value) {
        $question = [
            "id" => $value["id"],
            "question" => addDoubleQuote($value["question"]),
            "description" => (is_null($value["description"]) ? "NULL" : addDoubleQuote($value["description"])),
            "answers" => (is_null($value["answers"]) ? "NULL" : addDoubleQuote(json_encode($value["answers"]))),
            "multiple_correct_answers" => (is_null($value["multiple_correct_answers"]) ? "NULL" : addDoubleQuote($value["multiple_correct_answers"])),
            "correct_answers" => (is_null($value["correct_answers"]) ? "NULL" : addDoubleQuote(json_encode($value["correct_answers"]))),
        ];

        $id = $question["id"];
        $same_question = executeScript("SELECT * FROM questions WHERE id = $id");

        if (count($same_question) == 0) {
            $insert = "INSERT INTO questions(id, question, description, answers, multiple_correct_answers, correct_answers) VALUES";
            $values = "(" . implode(", ", $question) . ");";

            executeScript($insert . $values, 'insert');
        }
    }
}



fillDatabase();
