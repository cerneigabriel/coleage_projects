<h5>Your Score: <?php echo $score["percent"] . "% (" . $score["correct"] . "/" . $score["total"] . ")"; ?></h5>

<?php foreach ($questions as $report) : ?>
    <h5><?php echo $report["question"]->question; ?></h5>
    <p><?php echo $report["score"]["percent"] . "% (" . $report["score"]["correct"] . "/" . $report["score"]["total"] . ")"; ?></p>

    <ol type="a">
        <?php foreach ($report["question"]->answers() as $answer) : ?>
            <li>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <?php if ($answer->is_correct) : ?>
                            <div class="input-group-text">Correct</div>
                        <?php endif; ?>
                        <?php if (in_array($answer->id, $report["user_answers"])) : ?>
                            <div class="input-group-text">User Answer</div>
                        <?php endif; ?>
                    </div>
                    <input type="text" class="form-control" disabled value="<?php echo $answer->answer ?>">
                </div>
            </li>
        <?php endforeach; ?>
    </ol>
<?php endforeach; ?>

<a href="?page=index">&#x2190; Try Again</a>