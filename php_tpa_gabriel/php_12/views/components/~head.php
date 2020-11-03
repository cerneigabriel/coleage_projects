<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo isset($title) ? "Colegiu - $title" : "Colegiu"; ?></title>

    <link rel="stylesheet" href="<?php echo ASSETS_VENDOR_PATH . "bootstrap/css/bootstrap.min.css" ?>">
    <link rel="stylesheet" href="<?php echo ASSETS_VENDOR_PATH . "fontawesome-free-5.15.1-web/css/all.min.css" ?>">
    <link rel="stylesheet" href="<?php echo ASSETS_CSS_PATH . "app.css" ?>">
</head>

<body>

    <?php require VIEWS_PATH . 'components/~navbar.php'; ?>