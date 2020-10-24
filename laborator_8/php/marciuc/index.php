<?php include 'start_sql.php'; ?>

<?php
if (isset($_SESSION["db"])) {
    $questions = executeScript("SELECT * FROM questions ORDER BY RAND() LIMIT 6;");
} else die();
?>

<form action="verificare.php" method="post">
    <?php foreach ($questions as $question) : ?>
        <div class="question">
            <?php echo "<h4>" . $question["question"] . "</h4>"; ?>
            <?php echo (!is_null($question["description"]) ? "<p>" . $question["description"] . "</p>" : ""); ?>
            <?php if (!is_null($question["answers"])) : ?>
                <ol type="a">
                    <?php foreach (json_decode($question["answers"], true) as $name => $answer) : ?>
                        <?php if (!is_null($answer)) : ?>
                            <li>
                                <?php if ($question["multiple_correct_answers"] == "true") : ?>
                                    <input type="checkbox" name="<?php echo $question["id"] . "[]"; ?>" value="<?php echo $name; ?>">
                                    <label for=""><?php echo htmlspecialchars($answer); ?></label>
                                <?php else : ?>
                                    <input type="radio" name="<?php echo $question["id"]; ?>" value="<?php echo $name; ?>">
                                    <label for=""><?php echo htmlspecialchars($answer); ?></label>
                                <?php endif; ?>
                            </li>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </ol>
            <?php endif; ?>
        </div>
    <?php endforeach; ?>
    <br>
    <button type="submit">Verifica</button>
</form>