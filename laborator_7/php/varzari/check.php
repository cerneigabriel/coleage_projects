<?php

$questions = [
    [
        "question" => "Se permite circulaţia (exploatarea) pe drumul public a autovehiculului cu instalaţia de iluminare defectată?",
        "type" => "select",
        "answers" => [
            "da",
            "da, deoarece drumul pe care se circulă este iluminat",
            "nu"
        ],
        "right_answers" => [2]
    ],
    [
        "question" => "Autovehiculele şi remorcile pot circula pe drumurile publice dacă:",
        "type" => "radio",
        "answers" => [
            "corespund actelor normative privind siguranţa traficului rutier",
            "au un aspect exterior plăcut",
            "au o greutate mai mare, decât masa maximă autorizată"
        ],
        "right_answers" => [0]
    ],
    [
        "question" => "Când se interzice exploatarea vehiculelor dacă aţi depistat defecţiuni la sistemul de frânare?",
        "type" => "check",
        "answers" => [
            "nu funcţionează semnalul de control al frânei de mână",
            "este defectat sau eficienţa acestuia nu corespunde cerinţelor standardelor în vigoare",
            "este mic jocul pedalei frânei",
            "este modificată construcţia sistemului de frânare, subansamblurile sau piesele nu corespund modelului vehiculului în cauză, precum şi exigenţelor întreprinderii producătoare"
        ],
        "right_answers" => [1, 3]
    ],
    [
        "question" => "Se interzice deplasarea ulterioară a vehiculelor dacă:",
        "type" => "check",
        "answers" => [
            "nu funcţionează farurile şi lanternele de gabarit din spate",
            "nu funcţionează sistemul de direcţie",
            "nu funcţionează dispozitivele de ştergere, de spălare şi dezaburire a parbrizului din partea conducătorului",
            "nu funcţionează frâna de serviciu şi/sau autovehiculul prezintă scurgeri de carburanţi"
        ],
        "right_answers" => [1, 3]
    ],
    [
        "question" => "Care este înălţimea reziduală minimă permisă a profilului benzii de rulare a pneurilor autoturismului?",
        "type" => "select",
        "answers" => [
            "0,8 mm",
            "1,0 mm",
            "1,6 mm",
            "2,0 mm"
        ],
        "right_answers" => [2]
    ],
    [
        "question" => "Este permisă montarea altui dispozitiv de semnalizare sonoră decât cel revăzut prin construcţie de către proprietarul autovehiculului?",
        "type" => "radio",
        "answers" => [
            "nu",
            "da"
        ],
        "right_answers" => [0]
    ]
];

if (isset($_GET["answers"])) {
    $answers = $_GET["answers"];
    $show = [];
    $right_answers = 0;
    $wrong_answers = [];

    if (count($answers) < count($questions)) header("Location: index.php");

    foreach ($answers as $key => $answer) {
        $question = $questions[$key];
        $right_answers_temp = implode(", ", array_map(function ($value) {
            if (is_numeric($value))
                return $value + 1;
            return $value;
        }, $question["right_answers"]));


        if (gettype($answer) == "string") {
            if ((is_numeric($answer) && in_array((int) $answer, $question["right_answers"])) || in_array($answer, $question["right_answers"])) {
                $right_answers++;
            } else {
                $wrong_answers[] = "<li>Ai gresit raspunsul la intrebarea " . ($key + 1) . ", raspunsul corect este $right_answers_temp</li>";
            }
        } elseif (gettype($answer) == "array" || gettype($answer) == "object") {
            $right = array_intersect($answer, $question["right_answers"]);
            $wrong = array_diff($answer, $question["right_answers"]);

            if (count($right) > 0) {
                if (count($wrong) == 0)
                    $right_answers++;
                elseif (count($right) == count($question["right_answers"]))
                    $wrong_answers[] = "<li>Ai ales " . count($right) . " puncte corecte la intrebarea  " . ($key + 1) . ", dar ai gresit alegand celelalte raspunsuri. Raspunsul corect este $right_answers_temp</li>";
                else
                    $wrong_answers[] = "<li>Ai ales " . count($right) . " puncte corecte la intrebarea  " . ($key + 1) . ", dar ai scapat urmatoarele: $right_answers_temp</li>";
            } else {
                $wrong_answers[] = "<li>Ai gresit raspunsul la intrebarea " . ($key + 1) . ", raspunsul corect este $right_answers_temp</li>";
            }
        }
    }
    array_push($show, "<ul>" . (count($wrong_answers) > 0 ? implode(" ", $wrong_answers) : "&#129395; Felicitari tinere sofer &#129395;") . "</ul>");
    array_push($show, "<h2>$right_answers / " . count($questions) . "</h2>");

    array_push($show, "<ol>" . implode("<br>", array_map(function ($value) {
        return "<li>" . $value["question"] . "<br><ul>" . implode("", array_map(function ($value) {
            return "<li>" . $value . "</li>";
        }, $value["answers"])) . "</ul></li>";
    }, $questions)) . "</ol><br><br>");

    echo implode(" ", array_reverse($show));
}
