<?php
$table_head = [
    "Id",
    "Nume",
    "Prenume",
    "Varsta",
    "Orasul"
];
$table_body = [
    [
        "id" => 0,
        "first_name" => "Gillian",
        "last_name" => "Townsend",
        "age" => 74,
        "city" => "Rocky Mountain House"
    ],
    [
        "id" => 1,
        "first_name" => "Gavin",
        "last_name" => "Dyer",
        "age" => 96,
        "city" => "Lanark County"
    ],
    [
        "id" => 2,
        "first_name" => "Quemby",
        "last_name" => "Newton",
        "age" => 6,
        "city" => "Oberpullendorf"
    ],
    [
        "id" => 3,
        "first_name" => "Tanya",
        "last_name" => "Mercado",
        "age" => 78,
        "city" => "Palakkad"
    ],
    [
        "id" => 4,
        "first_name" => "Edan",
        "last_name" => "Stewart",
        "age" => 63,
        "city" => "Oberpullendorf"
    ],
    [
        "id" => 5,
        "first_name" => "Deborah",
        "last_name" => "Vance",
        "age" => 36,
        "city" => "Lanark County"
    ],
    [
        "id" => 6,
        "first_name" => "Gail",
        "last_name" => "Gardner",
        "age" => 78,
        "city" => "Lanark County"
    ]
];

$table_body_grouped = [];
foreach ($table_body as $key => $item) {
    $not_in_array = true;
    foreach ($table_body_grouped as $k => $i) {
        if ($k == $item["city"]) $note_in_array = false;
    }

    if ($not_in_array) {
        $table_body_grouped[$item["city"]] = array_filter($table_body, function ($_item) use ($item) {
            return $_item["city"] === $item["city"];
        });
    }
}

// Example with your $terms
function ASC_ID($a, $b, $col = "id")
{
    return $a[$col] - $b[$col];
}

function ASC_AGE($a, $b, $col = "age")
{
    return $a[$col] - $b[$col];
}

function DESC_FIRST_NAME($a, $b, $col = "first_name")
{
    return strcmp($a[$col], $b[$col]) * -1;
}

function DESC_CITY_NAME($a, $b, $col = "city")
{
    return strnatcasecmp($a[$col], $b[$col]) * -1;
}

$sorted_table_bodies = [];

for ($i = 0; $i < 4; $i++) $sorted_table_bodies[$i] = $table_body;

usort($sorted_table_bodies[0], "ASC_ID");
usort($sorted_table_bodies[1], "ASC_AGE");
usort($sorted_table_bodies[2], "DESC_FIRST_NAME");
usort($sorted_table_bodies[3], "DESC_CITY_NAME");

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>
        header {
            display: flex;
            align-items: center;
            padding: 0.5em;
            background-color: #808080;
            color: white;
        }

        header>a {
            width: 17%;
            font-size: 2em;
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
            border: 1px solid #000000;
        }

        table th {
            font-weight: bold;
            text-align: left;
            padding-top: 0.5em;
            padding-bottom: 0.5em;
            background-color: #e0e0e0;
        }

        table tfoot {
            font-weight: bold;
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
            <h1>Laborator CFBC</h1>
            <p>Pentru acest div pe linga border-left si padding(1em) setati proprietatea min-height: 300px, si margin-left 190px div header si footer au aceleasi proprietati, padding(0.5em) colo, background-color, clear(left).</p>
            <hr>
            <table>
                <tr>
                    <?php foreach ($table_head as $th) : ?>
                        <th><?php echo $th; ?></th>
                    <?php endforeach; ?>
                </tr>
                <?php foreach ($table_body as $tr) : ?>
                    <tr>
                        <td><?php echo $tr["id"]; ?></td>
                        <td><?php echo $tr["first_name"]; ?></td>
                        <td><?php echo $tr["last_name"]; ?></td>
                        <td><?php echo $tr["age"]; ?></td>
                        <td><?php echo $tr["city"]; ?></td>
                    </tr>
                <?php endforeach; ?>
            </table>

            <br>

            <ol>
                <?php foreach ($table_body_grouped as $k => $body) : ?>
                    <li><?php echo $k; ?></li>
                    <ul type="disc">
                        <?php foreach ($body as $tr) : ?>
                            <li><strong><?php echo $table_head[0] . ": "; ?></strong><?php echo $tr["id"]; ?></li>
                            <li><strong><?php echo $table_head[1] . ": "; ?></strong><?php echo $tr["first_name"]; ?></li>
                            <li><strong><?php echo $table_head[2] . ": "; ?></strong><?php echo $tr["last_name"]; ?></li>
                            <li><strong><?php echo $table_head[3] . ": "; ?></strong><?php echo $tr["age"]; ?></li>
                            <li><strong><?php echo $table_head[4] . ": "; ?></strong><?php echo $tr["city"]; ?></li>
                            <br>
                        <?php endforeach; ?>
                    </ul>
                <?php endforeach; ?>
            </ol>

            <br>

            <table>
                <tr>
                    <?php foreach ($table_head as $th) : ?>
                        <th><?php echo $th; ?></th>
                    <?php endforeach; ?>
                </tr>
                <?php foreach ($table_body_grouped as $k => $body) : ?>
                    <tr>
                        <th colspan="<?php echo count($table_head); ?>"><?php echo $k; ?></th>
                    </tr>
                    <?php foreach ($body as $tr) : ?>
                        <tr>
                            <td><?php echo $tr["id"]; ?></td>
                            <td><?php echo $tr["first_name"]; ?></td>
                            <td><?php echo $tr["last_name"]; ?></td>
                            <td><?php echo $tr["age"]; ?></td>
                            <td><?php echo $tr["city"]; ?></td>
                        </tr>
                    <?php endforeach; ?>
                <?php endforeach; ?>
            </table>

            <br>

            <h2>ASC - Id</h2>
            <table>
                <tr>
                    <?php foreach ($table_head as $th) : ?>
                        <th><?php echo $th; ?></th>
                    <?php endforeach; ?>
                </tr>
                <?php foreach ($sorted_table_bodies[0] as $tr) : ?>
                    <tr>
                        <td><?php echo $tr["id"]; ?></td>
                        <td><?php echo $tr["first_name"]; ?></td>
                        <td><?php echo $tr["last_name"]; ?></td>
                        <td><?php echo $tr["age"]; ?></td>
                        <td><?php echo $tr["city"]; ?></td>
                    </tr>
                <?php endforeach; ?>
            </table>

            <br>

            <h2>ASC - Varsta</h2>
            <table>
                <tr>
                    <?php foreach ($table_head as $th) : ?>
                        <th><?php echo $th; ?></th>
                    <?php endforeach; ?>
                </tr>
                <?php foreach ($sorted_table_bodies[1] as $tr) : ?>
                    <tr>
                        <td><?php echo $tr["id"]; ?></td>
                        <td><?php echo $tr["first_name"]; ?></td>
                        <td><?php echo $tr["last_name"]; ?></td>
                        <td><?php echo $tr["age"]; ?></td>
                        <td><?php echo $tr["city"]; ?></td>
                    </tr>
                <?php endforeach; ?>
            </table>

            <br>

            <h2>DESC - Nume</h2>
            <table>
                <tr>
                    <?php foreach ($table_head as $th) : ?>
                        <th><?php echo $th; ?></th>
                    <?php endforeach; ?>
                </tr>
                <?php foreach ($sorted_table_bodies[2] as $tr) : ?>
                    <tr>
                        <td><?php echo $tr["id"]; ?></td>
                        <td><?php echo $tr["first_name"]; ?></td>
                        <td><?php echo $tr["last_name"]; ?></td>
                        <td><?php echo $tr["age"]; ?></td>
                        <td><?php echo $tr["city"]; ?></td>
                    </tr>
                <?php endforeach; ?>
            </table>

            <br>

            <h2>DESC - Oras</h2>
            <table>
                <tr>
                    <?php foreach ($table_head as $th) : ?>
                        <th><?php echo $th; ?></th>
                    <?php endforeach; ?>
                </tr>
                <?php foreach ($sorted_table_bodies[3] as $tr) : ?>
                    <tr>
                        <td><?php echo $tr["id"]; ?></td>
                        <td><?php echo $tr["first_name"]; ?></td>
                        <td><?php echo $tr["last_name"]; ?></td>
                        <td><?php echo $tr["age"]; ?></td>
                        <td><?php echo $tr["city"]; ?></td>
                    </tr>
                <?php endforeach; ?>
            </table>
        </section>
    </main>

    <?php @include "footer.php"; ?>
</body>

</html>