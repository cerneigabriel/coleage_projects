<form id="quiz" action="index.php" method="POST" data-function-name="quiz.calculate">
    <input type="hidden" name="_function_name" value="quiz.calculate">

    <div class="row">
        <div class="col-2">
            <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                <?php
                $i = 0;
                foreach ($questions as $question) : $i++; ?>
                    <a class="nav-link <?php echo ($i === 1 ? "active" : ""); ?>" id="v-pills-<?php echo $i; ?>-tab" data-toggle="pill" href="#v-pills-<?php echo $i; ?>" role="tab" aria-controls="v-pills-<?php echo $i; ?>" aria-selected="true"><?php echo "Question " . $i; ?></a>
                <?php endforeach; ?>
            </div>
        </div>
        <div class="col-10">
            <div class="tab-content" id="v-pills-tabContent">
                <?php
                $i = 0;
                foreach ($questions as $question) : $i++; ?>

                    <div class="tab-pane fade <?php echo ($i === 1 ? "show active" : ""); ?>" id="v-pills-<?php echo $i; ?>" role="tabpanel" aria-labelledby="v-pills-<?php echo $i; ?>-tab">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo "Question " . $i . ": $question->question"; ?></h5>
                            </div>
                            <ul class="list-group list-group-flush">
                                <?php

                                if ($question->type()->name == "select") {
                                    echo implode("", [
                                        "<li class='list-group-item'>",
                                        "<div class='form-group'>",
                                        "<label class='form-label' for='$question->id'>Alege raspunsul:</label>",
                                        "<select class='form-control' name='$question->id' id='$question->id'>"
                                    ]);
                                }

                                $answers = $question->answers();
                                shuffle($answers);
                                ?>

                                <?php foreach ($answers as $answer) : ?>
                                    <li class="list-group-item">

                                        <?php if ($question->type()->name == "checkbox") : ?>

                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="<?php echo "$question->id-$answer->id" ?>" name="<?php echo $question->id . "[]" ?>" value="<?php echo $answer->id; ?>">
                                                <label class="custom-control-label" for="<?php echo "$question->id-$answer->id" ?>"><?php echo $answer->answer ?></label>
                                            </div>

                                        <?php elseif ($question->type()->name == "radio") : ?>

                                            <div class="custom-control custom-radio">
                                                <input type="radio" class="custom-control-input" id="<?php echo "$question->id-$answer->id" ?>" name="<?php echo $question->id ?>" value="<?php echo $answer->id; ?>">
                                                <label class="custom-control-label" for="<?php echo "$question->id-$answer->id" ?>"><?php echo $answer->answer ?></label>
                                            </div>

                                        <?php elseif ($question->type()->name == "select") : ?>

                                            <option value="<?php echo $answer->id; ?>"><?php echo $answer->answer; ?></option>

                                        <?php elseif ($question->type()->name == "text") : ?>

                                            <div class="form-group">
                                                <label class="form-label" for="<?php echo $question->id ?>">Scrie raspunsul:</label>
                                                <input type="text" class="form-control" id="<?php echo $question->id ?>" name="<?php echo $question->id ?>" placeholder="Scrie aici...">
                                            </div>

                                        <?php endif; ?>

                                    </li>

                                <?php endforeach; ?>

                                <?php if ($question->type()->name == "select") echo "</select></div></li>"; ?>
                            </ul>
                            <div class="card-body">
                                <?php if ($i !== 1) : ?>
                                    <button type="button" class="btn btn-outline-success" onCLick="document.getElementById('v-pills-<?php echo $i - 1; ?>-tab').click()">
                                        Previous Question
                                    </button>
                                <?php endif; ?>
                                <?php if ($i !== count($questions)) : ?>
                                    <button type="button" class="btn btn-success" onCLick="document.getElementById('v-pills-<?php echo $i + 1; ?>-tab').click()">
                                        Next Question
                                    </button>
                                <?php endif; ?>
                                <?php if ($i === count($questions)) : ?>
                                    <button type="submit" class="btn btn-success">
                                        Calculate Result
                                    </button>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>

                <?php endforeach; ?>
            </div>
        </div>
    </div>



</form>