<?php include 'sql.php'; ?>

<?php
if (isset($_SESSION["connection"])) {
    $questions = executeScript("SELECT id, question, input_type_id FROM questions;");

    foreach ($questions as $key => $question) {
        unset($questions[$key]['0']);
        unset($questions[$key]['1']);
        unset($questions[$key]['2']);


        $questions[$key]["input_type"] = executeScript("SELECT name FROM input_types WHERE id = " . $question["input_type_id"] . " LIMIT 1;")[0]["name"];
        $questions[$key]["answers"] = executeScript("SELECT id, answer FROM answers WHERE question_id = " . $question["id"] . ";");

        foreach ($questions[$key]["answers"] as $_key => $answer) {
            unset($questions[$key]["answers"][$_key]["0"]);
            unset($questions[$key]["answers"][$_key]["1"]);
            unset($questions[$key]["answers"][$_key]["2"]);
        }
    }
}
?>


<form action="check.php" method="post">
    <?php foreach ($questions as $question) : ?>
        <h4><?php echo $question["question"]; ?></h4>

        <?php if ($question["input_type"] === "select") : ?>
            <select name="<?php echo $question["id"]; ?>">
            <?php endif; ?>

            <?php foreach ($question["answers"] as $answer) : ?>
                <?php if ($question["input_type"] === "radio") : ?>
                    <input type="radio" name="<?php echo $question["id"]; ?>" value="<?php echo $answer["id"]; ?>">
                    <label for="<?php echo $question["id"]; ?>_<?php echo $answer["id"]; ?>"><?php echo $answer["answer"]; ?></label>
                    <br>
                <?php endif; ?>

                <?php if ($question["input_type"] === "check") : ?>
                    <input type="checkbox" name="<?php echo $question["id"]; ?>[]" value="<?php echo $answer["id"]; ?>">
                    <label for="<?php echo $question["id"]; ?>_<?php echo $answer["id"]; ?>"><?php echo $answer["answer"]; ?></label>
                    <br>
                <?php endif; ?>

                <?php if ($question["input_type"] === "select") : ?>
                    <option value="<?php echo $answer["id"]; ?>"><?php echo $answer["answer"]; ?></option>
                <?php endif; ?>
            <?php endforeach; ?>

            <?php if ($question["input_type"] === "select") : ?>
            </select>
        <?php endif; ?>

        <br>
    <?php endforeach; ?>

    <br>
    <button type="submit">Trimite</button>
</form>