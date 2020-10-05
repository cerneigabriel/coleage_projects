<?php
    $tablou = [234, 65, 45, 3, 565, 3562, 45];
    $tablou_clona = [];

    foreach ($tablou as $i) {
        array_push($tablou_clona, $i);
    }

    printf(json_encode($tablou_clona));

    function bs($arr) {
        for ($i=0; $i<count($arr)-1; $i++) {
            for ($j=0; $j<count($arr)-$i-1; $j++) {
                $k = $j+1;
                if ($arr[$k] < $arr[$j]) {
                    $aux = $arr[$j];
                    $arr[$j] = $arr[$k];
                    $arr[$k] = $aux;
                }
            }
        }
        return $arr;
    }

    printf(json_encode(bs($tablou)));
    session_start();
?>

<!DOCTYPE >
<html>
<head>
    <title>Document</title>
</head>
<body>
    <form action="index.php" method="POST">
        <input type="number" name="n" value="<?php echo (isset($_SESSION['n']) ? $_SESSION['n'] : ''); ?>">
        <button type="submit">Transmite</button>
    </form>
    <form action="index.php" method="GET">
        <button type="submit">Afiseaza</button>
    </form>
    <p><?php if (isset($_POST["n"])) {
        $_SESSION['n'] = $_POST["n"];
        $_SESSION['n_arr'] = str_split($_POST["n"]);
    } elseif (isset($_SESSION['n'])) {
        echo json_encode($_SESSION['n_arr']);
    }?></p>
</body>
</html>