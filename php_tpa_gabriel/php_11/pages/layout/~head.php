<?php

use App\Classes\Core\Session;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include "pages/layout/~meta.php" ?>

    <?php include "pages/layout/~styles.php" ?>
</head>

<body>
    <div class="jumbotron bg-dark text-white">
        <div class="container">
            <div class="row justify-content-between">
                <h1>Quiz - Cernei Gabriel</h1>
                <div>
                    <?php if (Session::hasItem("quiz_response")) : ?>
                        <?php if (Session::getItem("quiz_response")["score"]["correct"] === Session::getItem("quiz_response")["score"]["total"]) : ?>
                            <h2>
                                <strong><span class="text-success">&#x2714;</span><?php echo "PASSED"; ?></strong>
                            </h2>
                        <?php else : ?>
                            <h2>
                                <strong><span class="text-danger">&#x2718;</span><?php echo "NOT PASSED"; ?></strong>
                            </h2>
                        <?php endif; ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
    <div class="container pb-5">
        <?php if (Session::hasItem("errors")) : ?>
            <div class="d-flex flex-column">
                <?php foreach (Session::getItem("errors") as $error) : ?>
                    <div class="alert alert-danger" role="alert">
                        <?php echo $error; ?>
                    </div>
                <?php endforeach; ?>
            </div>
            <?php Session::removeItem("errors"); ?>
        <?php endif; ?>