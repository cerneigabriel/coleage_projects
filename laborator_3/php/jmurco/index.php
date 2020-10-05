<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
    <?php
        function first($k, $n = 1) {
           $t = [];
           if ($n > count($k)) $n = count($k);
            for ($i=0;$i<$n;$i++) $t[] = $k[$i];
            return $t;
        }

        function union($k, $o) {
            $union = [];
            foreach ($k as $v) {
                if (!in_array($v, $union)) $union[] = $v;

                foreach ($o as $v1) {
                    if (!in_array($v1, $union)) $union[] = $v1;
                }
            }
            for ($i=0; $i < count($union); $i++) { 
                for ($j=$i; $j < count($union); $j++) { 
                    if ($union[$i] > $union[$j]) {
                        $aux = $union[$i];
                        $union[$i] = $union[$j];
                        $union[$j] = $aux;
                    }
                }
            }
            return $union;
        }

        function rangeBetwee($s, $f) {
            $range = [];
            
            while ($s <= $f) {
                $range[] = $s;
                $s++;
            }

            return $range;
        }
    ?>

        <form action="index.php" method="GET">
            <input type="number" name="n">
            <button type="submit">Afis</button>
        </form>
    <?php
        if (isset($_GET["n"]) && (int)$_GET["n"] > 0) echo json_encode(first([7, 9, 0, -2], (int)$_GET["n"]));
        else echo json_encode(first([7, 9, 0, -2]));
        echo "<br><br>";
        echo json_encode(union([1, 2, 3], [100, 2, 1, 10]));
        echo "<br><br>";
        echo json_encode(rangeBetwee(-4, 7));
    ?>

</body>
</html>