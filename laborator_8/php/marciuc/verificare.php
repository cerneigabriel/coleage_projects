<?php
include 'start_sql.php';

if (isset($_POST)) {
    $results = $_POST;
    $questions = [];
    $total_earned_points = 0;

    if (gettype($results) == "object" || gettype($results) == "array") {
        foreach ($results as $id => $answers) {
            $question = executeScript("SELECT * FROM questions WHERE id = $id LIMIT 1;")[0];
            $percent = 0;

            if ($question) {
                $question["correct_answers"] = (array) json_decode($question["correct_answers"], true);
                $question["answers"] = (array) json_decode($question["answers"], true);
                for ($i = 0; $i < 7; $i++) unset($question[$i]);
                $questions[$id]["question"] = $question;

                $true_answers = array_filter($question["correct_answers"], function ($value) {
                    return filter_var($value, FILTER_VALIDATE_BOOLEAN) === true;
                });

                $correct_answers = array_map(function ($value) {
                    return str_replace("_correct", "", $value);
                }, array_keys($true_answers));

                $correct_answers_string = implode(", ", $correct_answers);

                if ($question["multiple_correct_answers"] == "true") {
                    $percent_step = 100 / count($true_answers);
                    $questions[$id]["question"]["selected_answers"] = $answers;

                    foreach ($answers as $answer) {
                        foreach ($question["correct_answers"] as $correct_answer_name => $correct_answer) {
                            $percent += ($correct_answer_name == $answer . "_correct" ? $percent_step : 0);
                        }
                    }
                } else {
                    $questions[$id]["question"]["selected_answers"][] = $answers;
                    $percent = (in_array($answers, $correct_answers) ? 100 : 0);
                }

                if ($percent == 0) $questions[$id]["messages"]["error"] = "Ai raspuns gresit la aceasta intrebare.<br>Raspunsurile corecte sunt $correct_answers_string";
                elseif ($percent == 100) $questions[$id]["messages"]["success"] = "Ai raspuns corect la aceasta intrebare.";
                elseif (0 < $percent && $percent < 100) $questions[$id]["messages"]["success"] = "Ai raspuns partial corect la aceasta intrebare.<br>Raspunsurile corecte sunt $correct_answers_string";

                $questions[$id]["points"] = $percent / 10;
                $total_earned_points += $questions[$id]["points"];
            }
        }
    }

    $error = "style='color: red;'";
    $success = "style='color: green;'";
    $normal = "style='color: black;'";

    $total_points = 10 * count($questions);
?>
    <h1><?php echo $total_earned_points . "/" . $total_points; ?> puncte</h1>
    <?php foreach ($questions as $id => $item) : ?>
        <div class="question">
            <h4><?php echo $item["question"]["question"]; ?></h4>

            <p><strong><?php echo $item["points"]; ?> puncte</strong></p>

            <?php if (!is_null($item["question"]["description"])) : ?>
                <p><?php echo $item["question"]["description"]; ?></p>
            <?php endif; ?>

            <?php if (!is_null($item["question"]["answers"])) : ?>
                <ol type="a">
                    <?php foreach ($item["question"]["answers"] as $name => $answer) : ?>
                        <?php if (!is_null($answer)) : ?>
                            <li <?php echo (in_array($name, $item["question"]["selected_answers"]) ? "style='text-decoration: underline;'" : ''); ?>><?php echo htmlspecialchars($answer); ?></li>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </ol type="a">
            <?php endif; ?>

            <?php foreach ($item["messages"] as $type => $message) : ?>
                <span <?php echo $$type; ?>><?php echo $message; ?></span>
            <?php endforeach; ?>
        </div>
    <?php endforeach; ?>

<?php
} else die();
