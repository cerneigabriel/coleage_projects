<?php
$array = [
    ["id" => 0, "nume" => "Orli", "prenume" => "Rosales", "varsta" => 20, "oras" => "LaSalle"],
    ["id" => 1, "nume" => "Patience", "prenume" => "Macdonald", "varsta" => 4, "oras" => "Jiutepec"],
    ["id" => 2, "nume" => "Guy", "prenume" => "Hardy", "varsta" => 28, "oras" => "Jiutepec"],
    ["id" => 3, "nume" => "Wyatt", "prenume" => "Dillon", "varsta" => 54, "oras" => "Qualicum Beach"],
    ["id" => 4, "nume" => "Penelope", "prenume" => "Hogan", "varsta" => 58, "oras" => "LaSalle"],
    ["id" => 5, "nume" => "Emerson", "prenume" => "Guerra", "varsta" => 42, "oras" => "Biesme-sous-Thuin"],
    ["id" => 6, "nume" => "TaShya", "prenume" => "Terrell", "varsta" => 14, "oras" => "Jiutepec"]
];

$arrayGrupat = [];
foreach ($array as $v) {
    if (array_key_exists("oras", $v)) {
        $arrayGrupat[$v["oras"]][] = $v;
    } else $arrayGrupat[""][] = $v;
}

$arraySortat = $array;
usort($arraySortat, function ($a, $b) {
    return $a["id"] - $b["id"];
});
usort($arraySortat, function ($a, $b) {
    return $a["varsta"] - $b["varsta"];
});
usort($arraySortat, function ($a, $b) {
    return strcmp($a["prenume"], $b["prenume"]) * -1;
});
usort($arraySortat, function ($a, $b) {
    return strcmp($a["oras"], $b["oras"]) * -1;
});
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Lambos Lucian - Laborator 6</title>

    <style>
        header {
            display: flex;
            align-items: center;
            padding: 0.5em;
            background-color: #808080;
            color: white;
        }

        header ul {
            display: flex;
            list-style: none;
        }

        header ul li {
            padding: 0.5rem 1.5rem;
            border: 1px solid white;
            background-color: #BDBEC4;
        }

        header ul li a {
            text-decoration: none;
        }

        main {
            display: flex;
            padding: 0.5em;
        }

        footer {
            display: flex;
            align-items: center;
            padding: 0.7rem 1rem;
            background-color: #808080;
            color: white;
        }

        table {
            width: 100%;
            border-spacing: 0;
        }

        table td,
        table th {
            border-bottom: 1px solid #000000;
        }

        table th {
            font-weight: bold;
            background-color: #e0e0e0;
        }
    </style>
</head>

<body>
    <?php @include "header.php"; ?>

    <main>
        <aside>
            <q>Nu cauta raspunsuri imposibile. Mai bine schimba intrebarile.</q>
            <cite>Confucius</cite>
        </aside>
        <section>
            <h1>Laborator 6 CFBC, Lambos Lucian</h1>
            <p>Pentru acest div pe linga border-left si padding(1em) setati proprietatea min-height: 300px, si margin-left 190px div header si footer au aceleasi proprietati, padding(0.5em) colo, background-color, clear(left).</p>
            <table>
                <tr>
                    <th>Id</th>
                    <th>Nume</th>
                    <th>Prenume</th>
                    <th>Varsta</th>
                    <th>Oras</th>
                </tr>
                <?php foreach ($array as $v) : ?>
                    <tr>
                        <td><?php echo $v["id"]; ?></td>
                        <td><?php echo $v["nume"]; ?></td>
                        <td><?php echo $v["prenume"]; ?></td>
                        <td><?php echo $v["varsta"]; ?></td>
                        <td><?php echo $v["oras"]; ?></td>
                    </tr>
                <?php endforeach; ?>
            </table>

            <br>

            <ol>
                <?php foreach ($arrayGrupat as $k => $v) : ?>
                    <li><?php echo $k; ?></li>
                    <ul>
                        <?php foreach ($v as $_v) : ?>
                            <li style="margin-top: 5px;margin-bottom: 5px;"><?php echo $_v["nume"] . " " . $_v["prenume"]; ?> <strong>|</strong> <?php echo $_v["varsta"] . " ani"; ?></li>
                        <?php endforeach; ?>
                    </ul>
                <?php endforeach; ?>
            </ol>

            <br>

            <table>
                <tr>
                    <th>Id</th>
                    <th>Nume</th>
                    <th>Prenume</th>
                    <th>Varsta</th>
                    <th>Oras</th>
                </tr>
                <?php foreach ($arrayGrupat as $k => $v) : ?>
                    <tr>
                        <th colspan="5"><?php echo $k; ?></th>
                    </tr>
                    <?php foreach ($v as $_v) : ?>
                        <tr>
                            <td><?php echo $_v["id"]; ?></td>
                            <td><?php echo $_v["nume"]; ?></td>
                            <td><?php echo $_v["prenume"]; ?></td>
                            <td><?php echo $_v["varsta"]; ?></td>
                            <td><?php echo $_v["oras"]; ?></td>
                        </tr>
                    <?php endforeach; ?>
                <?php endforeach; ?>
            </table>

            <br>

            <h2>ascendent dupa id + ascendent dupa varsta + descendent dupa prenume + descendent dupa oras</h2>
            <table>
                <tr>
                    <th>Id</th>
                    <th>Nume</th>
                    <th>Prenume</th>
                    <th>Varsta</th>
                    <th>Oras</th>
                </tr>
                <?php foreach ($arraySortat as $v) : ?>
                    <tr>
                        <td><?php echo $v["id"]; ?></td>
                        <td><?php echo $v["nume"]; ?></td>
                        <td><?php echo $v["prenume"]; ?></td>
                        <td><?php echo $v["varsta"]; ?></td>
                        <td><?php echo $v["oras"]; ?></td>
                    </tr>
                <?php endforeach; ?>
            </table>
        </section>
    </main>

    <?php @include "footer.php"; ?>
</body>

</html>