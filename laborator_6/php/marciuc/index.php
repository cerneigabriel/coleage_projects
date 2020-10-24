<!DOCTYPE html>
<html lang="en">

<head>
    <title>Laborator 6</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <?php
    $persoane = [
        ["id" => 0, "first_name" => "David", "last_name" => "Booth", "age" => 55, "city" => "Kano"],
        ["id" => 1, "first_name" => "Ursa", "last_name" => "Ortega", "age" => 43, "city" => "Castel Giorgio"],
        ["id" => 2, "first_name" => "Alfonso", "last_name" => "Oneill", "age" => 53, "city" => "Gubkin"],
        ["id" => 3, "first_name" => "Holly", "last_name" => "Young", "age" => 26, "city" => "Murray Bridge"],
        ["id" => 4, "first_name" => "Cheryl", "last_name" => "Conley", "age" => 49, "city" => "Grayvoron"],
        ["id" => 5, "first_name" => "Abra", "last_name" => "Mcintosh", "age" => 71, "city" => "Clearwater Municipal District"],
        ["id" => 6, "first_name" => "Mallory", "last_name" => "Cline", "age" => 45, "city" => "Perquenco"],
        ["id" => 7, "first_name" => "Tanner", "last_name" => "Hatfield", "age" => 44, "city" => "San Lazzaro di Savena"],
        ["id" => 8, "first_name" => "Taylor", "last_name" => "Chavez", "age" => 32, "city" => "Zerkegem"],
    ];

    $grouped = [];
    foreach ($persoane as $i) if (array_key_exists("city", $i)) $grouped[$i["city"]][] = $i;

    usort($persoane, function ($a, $b) {
        return $b["age"] - $a["age"];
    });
    usort($persoane, function ($a, $b) {
        return strcmp($a["last_name"], $b["last_name"]) * -1;
    });

    @include "header.php";
    ?>

    <div class="content">
        <h1>Laborator 6 CEEF</h1>
        <h3>By The king of programming, Marciuc Vladislav(AAW1713G)</h3>

        <?php @include "tables.php"; ?>
    </div>

    <?php @include "footer.php"; ?>
</body>

</html>