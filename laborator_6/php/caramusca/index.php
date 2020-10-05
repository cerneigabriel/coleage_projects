<!DOCTYPE html>
<html lang="en">

<head>
    <title>Caramusca Anton</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <?php
        $_GLOBALS["users"] = array (
            0 => 
            array (
              'id' => 1,
              'user_name' => 'Yvonne',
              'user_surname' => 'Bauer',
              'user_age' => 25,
              'user_city' => 'Bundaberg',
            ),
            1 => 
            array (
              'id' => 2,
              'user_name' => 'Paul',
              'user_surname' => 'Travis',
              'user_age' => 85,
              'user_city' => 'Grumo Appula',
            ),
            2 => 
            array (
              'id' => 3,
              'user_name' => 'Violet',
              'user_surname' => 'Reese',
              'user_age' => 30,
              'user_city' => 'León',
            ),
            3 => 
            array (
              'id' => 4,
              'user_name' => 'Quin',
              'user_surname' => 'Albert',
              'user_age' => 96,
              'user_city' => 'Iowa City',
            ),
            4 => 
            array (
              'id' => 5,
              'user_name' => 'Nicholas',
              'user_surname' => 'White',
              'user_age' => 19,
              'user_city' => 'Sagrada Familia',
            ),
            5 => 
            array (
              'id' => 6,
              'user_name' => 'Coby',
              'user_surname' => 'Willis',
              'user_age' => 44,
              'user_city' => 'Naro',
            ),
            6 => 
            array (
              'id' => 7,
              'user_name' => 'Brianna',
              'user_surname' => 'Pacheco',
              'user_age' => 9,
              'user_city' => 'Meerdonk',
            ),
            7 => 
            array (
              'id' => 8,
              'user_name' => 'Skyler',
              'user_surname' => 'Hendricks',
              'user_age' => 9,
              'user_city' => 'Ottawa',
            ),
            8 => 
            array (
              'id' => 9,
              'user_name' => 'Camilla',
              'user_surname' => 'Riddle',
              'user_age' => 59,
              'user_city' => 'Mayerthorpe',
            ),
            9 => 
            array (
              'id' => 10,
              'user_name' => 'Carol',
              'user_surname' => 'Guerra',
              'user_age' => 64,
              'user_city' => 'Wibrin',
            ),
            10 => 
            array (
              'id' => 11,
              'user_name' => 'Mia',
              'user_surname' => 'Barker',
              'user_age' => 30,
              'user_city' => 'Ladispoli',
            ),
            11 => 
            array (
              'id' => 12,
              'user_name' => 'Acton',
              'user_surname' => 'Rivera',
              'user_age' => 42,
              'user_city' => 'Oelegem',
            ),
            12 => 
            array (
              'id' => 13,
              'user_name' => 'Ifeoma',
              'user_surname' => 'Orr',
              'user_age' => 62,
              'user_city' => 'Rockford',
            ),
            13 => 
            array (
              'id' => 14,
              'user_name' => 'Allen',
              'user_surname' => 'Peck',
              'user_age' => 14,
              'user_city' => 'Ospedaletto d\'Alpinolo',
            ),
            14 => 
            array (
              'id' => 15,
              'user_name' => 'Tallulah',
              'user_surname' => 'Rivas',
              'user_age' => 14,
              'user_city' => 'Cras-Avernas',
            ),
            15 => 
            array (
              'id' => 16,
              'user_name' => 'Daquan',
              'user_surname' => 'Duffy',
              'user_age' => 13,
              'user_city' => 'La Serena',
            ),
            16 => 
            array (
              'id' => 17,
              'user_name' => 'Marny',
              'user_surname' => 'Glover',
              'user_age' => 78,
              'user_city' => 'Westmount',
            ),
            17 => 
            array (
              'id' => 18,
              'user_name' => 'Emerson',
              'user_surname' => 'Stevenson',
              'user_age' => 40,
              'user_city' => 'Trowbridge',
            ),
            18 => 
            array (
              'id' => 19,
              'user_name' => 'Lani',
              'user_surname' => 'Clayton',
              'user_age' => 31,
              'user_city' => 'Bangalore',
            ),
            19 => 
            array (
              'id' => 20,
              'user_name' => 'Griffith',
              'user_surname' => 'Valentine',
              'user_age' => 10,
              'user_city' => 'High Level',
            ),
            20 => 
            array (
              'id' => 21,
              'user_name' => 'Halee',
              'user_surname' => 'Mendoza',
              'user_age' => 16,
              'user_city' => 'Roselies',
            ),
        );
        function array_group_by(array $arr, $key) : array {
            $isFunction = !is_string($key) && is_callable($key);
            $grouped = [];
            foreach ($arr as $value) {
                $groupKey = null;
                if ($isFunction) $groupKey = $key($value);
                else if (is_object($value)) $groupKey = $value->{$key};
                else $groupKey = $value[$key];
                $grouped[$groupKey][] = $value;
            }
            if (func_num_args() > 2) {
                $args = func_get_args();
                foreach ($grouped as $groupKey => $value) {
                    $params = array_merge([$value], array_slice($args, 2, func_num_args()));
                    $grouped[$groupKey] = call_user_func_array('array_group_by', $params);
                }
            }
            return $grouped;
        }
        
        $groupByUserCity = array_group_by($_GLOBALS["users"], function ($row) { return $row["user_city"]; });
        usort($_GLOBALS["users"], function ($a, $b) { return $b["user_age"] - $a["user_age"]; });
        usort($_GLOBALS["users"], function ($a, $b) { return strcmp($a["user_surname"], $b["user_surname"]) * -1;});
    ?>


    <?php @include "header.php"; ?>

    <div class="content">
        <aside>
            <q>Nu cauta raspunsuri imposibile. Mai bine schimba intrebarile.</q>
            <cite>Confucius</cite>
        </aside>
        <main>
            <h1>Laborator 6 CEEF</h1>
            <h3>By The king of programming, Darius Coltea(AAW1713G)</h3>
    
            <table class="table" border="1">
                <tr>
                    <th>Id</th>
                    <th>Nume</th>
                    <th>Prenume</th>
                    <th>Varsta</th>
                    <th>Oras</th>
                </tr>
                <tr>
                    <?php
                        foreach ($users as $value) {
                            echo "<tr>";
                            echo "<td>" . $value["id"] . "</td>";
                            echo "<td>" . $value["user_name"] . "</td>";
                            echo "<td>" . $value["user_surname"] . "</td>";
                            echo "<td>" . $value["user_age"] . "</td>";
                            echo "<td>" . $value["user_city"] . "</td>";
                            echo "</tr>";
                        }
                    ?>
                </tr>
            </table>
    
            <br>
    
            <ul>
                <?php
                    foreach ($groupByUserCity as $key => $value) {
                        echo "<li>" . $key . "</li>";
                        echo "<ul>";
                        foreach ($value as $value_2) {
                            echo "<li>" . $value_2["id"] . "</li>";
                            echo "<li>" . $value_2["user_name"] . "</li>";
                            echo "<li>" . $value_2["user_surname"] . "</li>";
                            echo "<li>" . $value_2["user_age"] . "</li>";
                            echo "<li>" . $value_2["user_city"] . "</li>";
                            echo "<br>";
                        }
                        echo "</ul>";
                    }
                ?>
            </ul>
    
            <br>
    
            <table class="table" border="1">
                <tr>
                    <th>Id</th>
                    <th>Nume</th>
                    <th>Prenume</th>
                    <th>Varsta</th>
                    <th>Oras</th>
                </tr>
                <?php
                    foreach ($groupByUserCity as $key => $value) {
                        echo "<tr><th colspan='5'>" . $key . "</th></tr>";
                        foreach ($value as $value_2) {
                            echo "<tr>";
                            echo "<td>" . $value_2["id"] . "</td>";
                            echo "<td>" . $value_2["user_name"] . "</td>";
                            echo "<td>" . $value_2["user_surname"] . "</td>";
                            echo "<td>" . $value_2["user_age"] . "</td>";
                            echo "<td>" . $value_2["user_city"] . "</td>";
                            echo "</tr>";
                        }
                    }
                ?>
            </table>
        </main>
    </div>

    <?php @include "footer.php"; ?>
</body>

</html>