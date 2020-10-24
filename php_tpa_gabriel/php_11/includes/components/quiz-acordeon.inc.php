<form id="quiz" action="index.php" method="POST" data-function-name="quiz.calculate">
    <input type="hidden" name="_function_name" value="quiz.calculate">
    <div class="accordion" id="accordionExample">

        <?php
        $i = 0;
        foreach ($questions as $question) : ?>

            <div class="card">
                <div class="card-header" id="headingOne">
                    <h2 class="mb-0">
                        <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapse<?php echo $question->id; ?>" aria-expanded="true" aria-controls="collapse<?php echo $question->id; ?>">
                            <?php echo "Question " . ++$i . ": $question->question"; ?>
                        </button>
                    </h2>
                </div>

                <div id="collapse<?php echo $question->id; ?>" class="collapse <?php echo ($i == 1 ? "show" : ""); ?>" aria-labelledby="headingOne" data-parent="#accordionExample">
                    <div class="card-body px-5">
                        <?php if ($question->type()->name == "select") : ?>

                            <div class="form-group">
                                <label class="form-label" for="<?php echo $question->id ?>">Alege raspunsul:</label>
                                <select class="form-control" name="<?php echo $question->id ?>" id="<?php echo $question->id ?>">

                                <?php endif; ?>

                                <?php
                                $answers = $question->answers();
                                shuffle($answers);

                                foreach ($answers as $answer) :
                                    $input_name = "$question->id";
                                ?>

                                    <?php if ($question->type()->name == "checkbox") : ?>

                                        <div class="custom-control custom-checkbox mb-3">
                                            <input type="checkbox" class="custom-control-input" id="<?php echo "$input_name-$answer->id" ?>" name="<?php echo $input_name . "[]" ?>" value="<?php echo $answer->id; ?>">
                                            <label class="custom-control-label" for="<?php echo "$input_name-$answer->id" ?>"><?php echo $answer->answer ?></label>
                                        </div>

                                    <?php elseif ($question->type()->name == "radio") : ?>

                                        <div class="custom-control custom-radio mb-3">
                                            <input type="radio" class="custom-control-input" id="<?php echo "$input_name-$answer->id" ?>" name="<?php echo $input_name ?>" value="<?php echo $answer->id; ?>">
                                            <label class="custom-control-label" for="<?php echo "$input_name-$answer->id" ?>"><?php echo $answer->answer ?></label>
                                        </div>

                                    <?php elseif ($question->type()->name == "select") : ?>

                                        <option value="<?php echo $answer->id; ?>"><?php echo $answer->answer; ?></option>

                                    <?php elseif ($question->type()->name == "text") : ?>

                                        <div class="form-group">
                                            <label class="form-label" for="<?php echo $input_name ?>">Scrie raspunsul:</label>
                                            <input type="text" class="form-control" id="<?php echo $input_name ?>" name="<?php echo $input_name ?>" placeholder="Scrie aici...">
                                        </div>

                                    <?php endif; ?>

                                <?php endforeach; ?>

                                <?php if ($question->type()->name == "select") : ?>
                                </select>
                            </div>

                        <?php endif; ?>
                    </div>
                </div>
            </div>

        <?php endforeach; ?>

        <div class="card">
            <div class="card-header" id="headingOne">
                <h2 class="mb-0">
                    <div class="btn btn-link btn-block text-left">
                        <button type="submit" class="btn btn-success">Calculate Result</button>
                    </div>
                </h2>
            </div>
        </div>
    </div>
</form>