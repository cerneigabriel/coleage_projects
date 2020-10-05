<?php
require "./app/helpers.php";
require "./app/Classes/Session.php";
require "./app/Classes/User.php";

Session::start();

if (Session::getItem("response") === false) redirect("app/Controllers/controller.php");
else $users = Session::getItem("response");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>
        * {
            box-sizing: border-box;
            max-width: 100%;
        }

        html,
        body {
            padding: 0;
            margin: 0;
        }

        body {
            height: 100vh;
            overflow-y: hidden;
            display: grid;
            grid-template-rows: 1fr 85% 1fr;
            font-size: 16px;
            font-weight: 400;
            letter-spacing: 1px;
        }

        .Content {
            display: flex;
            align-items: stretch;
            justify-content: stretch;
            padding: 0.5rem;
        }

        .Content aside {
            width: 17%;
            border-right: 1px solid #808080;
            padding: 1.5rem;
            font-size: 1.2rem;
            line-height: 1.5;
        }

        .Content main {
            padding: 1.5rem;
            overflow-y: auto;
            overflow-x: hidden;
        }

        cite {
            display: block;
        }

        table.unstyledTable {
            font-family: Arial, Helvetica, sans-serif;
            width: 100%;
            border-spacing: 0;
            border: 0;
        }

        table.unstyledTable td,
        table.unstyledTable th {
            border: 1px solid #AAAAAA;
            padding: 6px 3px;
        }

        table.unstyledTable tbody td {
            font-size: 13px;
        }

        table.unstyledTable thead {
            background: #DDDDDD;
        }

        table.unstyledTable thead th {
            font-size: 15px;
            font-weight: bold;
            text-align: center;
        }

        table.unstyledTable tfoot {
            font-weight: bold;
        }
    </style>
</head>

<body>
    <?php @include "./components/header.php"; ?>

    <div class="Content">
        <aside>
            <q>Nu cauta raspunsuri imposibile. Mai bine schimba intrebarile.</q>
            <cite>Confucius</cite>
        </aside>
        <main>
            <h1>Laborator CFBC</h1>
            <p>Pentru acest div pe linga border-left si padding(1em) setati proprietatea min-height: 300px, si margin-left 190px div header si footer au aceleasi proprietati, padding(0.5em) colo, background-color, clear(left).</p>
            <hr>

            <form action="<?php echo url_builder('app/Controllers/controller.php'); ?>" method="POST">
                <input type="text" name="first_name" placeholder="First Name">
                <input type="text" name="last_name" placeholder="Last Name">
                <input type="date" name="birth_date" placeholder="Birthdate">
                <input type="text" name="city" placeholder="City">
                <button type="submit">Send</button>
            </form>
            <form action="<?php echo url_builder('app/Controllers/controller.php'); ?>" method="POST">
                <input type="hidden" name="reset" value="true">
                <button type="submit">Reset</button>
            </form>
            <form action="<?php echo url_builder('app/Controllers/controller.php'); ?>" method="POST">
                <input type="hidden" name="seeder" value="true">
                <button type="submit">Default Records</button>
            </form>

            <table class="unstyledTable">
                <thead>
                    <tr>
                        <th>
                            ID
                            <hr>
                            <form action="<?php echo url_builder('app/Controllers/controller.php'); ?>" method="GET">
                                <input type="hidden" name="sort" value="asc">
                                <input type="hidden" name="col" value="id">
                                <button type="submit">ASC</button>
                            </form>
                            <form action="<?php echo url_builder('app/Controllers/controller.php'); ?>" method="GET">
                                <input type="hidden" name="sort" value="desc">
                                <input type="hidden" name="col" value="id">
                                <button type="submit">DESC</button>
                            </form>
                        </th>
                        <th>
                            Nume
                            <hr>
                            <form action="<?php echo url_builder('app/Controllers/controller.php'); ?>" method="GET">
                                <input type="hidden" name="sort" value="asc">
                                <input type="hidden" name="col" value="first_name">
                                <button type="submit">ASC</button>
                            </form>
                            <form action="<?php echo url_builder('app/Controllers/controller.php'); ?>" method="GET">
                                <input type="hidden" name="sort" value="desc">
                                <input type="hidden" name="col" value="first_name">
                                <button type="submit">DESC</button>
                            </form>
                        </th>
                        <th>
                            Prenume
                            <hr>
                            <form action="<?php echo url_builder('app/Controllers/controller.php'); ?>" method="GET">
                                <input type="hidden" name="sort" value="asc">
                                <input type="hidden" name="col" value="last_name">
                                <button type="submit">ASC</button>
                            </form>
                            <form action="<?php echo url_builder('app/Controllers/controller.php'); ?>" method="GET">
                                <input type="hidden" name="sort" value="desc">
                                <input type="hidden" name="col" value="last_name">
                                <button type="submit">DESC</button>
                            </form>
                        </th>
                        <th>
                            Varsta
                        </th>
                        <th>
                            Orasul
                            <hr>
                            <form action="<?php echo url_builder('app/Controllers/controller.php'); ?>" method="GET">
                                <input type="hidden" name="sort" value="asc">
                                <input type="hidden" name="col" value="city">
                                <button type="submit">ASC</button>
                            </form>
                            <form action="<?php echo url_builder('app/Controllers/controller.php'); ?>" method="GET">
                                <input type="hidden" name="sort" value="desc">
                                <input type="hidden" name="col" value="city">
                                <button type="submit">DESC</button>
                            </form>
                        </th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($users as $user) : ?>
                        <tr>
                            <td><?php echo $user->id(); ?></td>
                            <td><?php echo $user->first_name(); ?></td>
                            <td><?php echo $user->last_name(); ?></td>
                            <td><?php echo date_diff(date_create($user->birth_date()), date_create(date("Y-m-d")))->format("%Y ani"); ?></td>
                            <td><?php echo $user->city(); ?></td>
                            <td>
                                <form action="<?php echo url_builder('app/Controllers/controller.php'); ?>" method="POST">
                                    <input type="hidden" name="destroy" value="true">
                                    <input type="hidden" name="id" value="<?php echo $user->id(); ?>">
                                    <button type="submit">Delete</button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
                </tr>
            </table>

            <br>

            <ol>
                <?php foreach (array_group_by($users, 'city') as $city => $city_users) : ?>
                    <li><?php echo $city . " (" . count($city_users) . ")"; ?></li>
                    <ul type="disc">
                        <?php foreach ($city_users as $user) : ?>
                            <li><strong>ID: </strong><?php echo $user->id(); ?></li>
                            <li><strong>Nume: </strong><?php echo $user->first_name(); ?></li>
                            <li><strong>Prenume: </strong><?php echo $user->last_name(); ?></li>
                            <li><strong>Varsta: </strong><?php echo date_diff(date_create($user->birth_date()), date_create(date("Y-m-d")))->format("%Y ani"); ?></li>
                            <li><strong>Orasul: </strong><?php echo $user->city(); ?></li>
                            <br>
                        <?php endforeach; ?>
                    </ul>
                <?php endforeach; ?>
            </ol>

            <br>

            <table class="unstyledTable">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nume</th>
                        <th>Prenume</th>
                        <th>Varsta</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach (array_group_by($users, 'city') as $city => $city_users) : ?>
                        <tr>
                            <th colspan="4"><?php echo $city . " (" . count($city_users) . ")"; ?></th>
                        </tr>

                        <?php foreach ($city_users as $user) : ?>
                            <tr>
                                <td><?php echo $user->id(); ?></td>
                                <td><?php echo $user->first_name(); ?></td>
                                <td><?php echo $user->last_name(); ?></td>
                                <td><?php echo date_diff(date_create($user->birth_date()), date_create(date("Y-m-d")))->format("%Y ani"); ?></td>
                            </tr>
                        <?php endforeach; ?>
                    <?php endforeach; ?>
                </tbody>
                </tr>
            </table>
        </main>
    </div>

    <?php @include "./components/footer.php"; ?>
</body>

</html>