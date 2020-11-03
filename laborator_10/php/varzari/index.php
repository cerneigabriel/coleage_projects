<?php
$database_exist = true;
try {
    $conn = new PDO("mysql:host=localhost;dbname=elevi_varzari", "root", "");
    $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    $database_exist = false;
}

if (!$database_exist) {
    $conn = new PDO("mysql:host=localhost", "root", "");
    $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = file_get_contents('Elevi.sql');
    $conn->exec($sql);
}

if (isset($conn)) {

    $filter = isset($_GET["filter"]) ? $_GET["filter"] : "lista";
    $search_value = isset($_GET["search"]) ? $_GET["search"] : "";
    $search = $search_value === "" ? "" : "nume LIKE '%" . $search_value . "%'";

    switch ($filter) {
        case "lista":
            try {
                $elevi = $conn->query("SELECT * FROM elevi " . ($search !== "" ? "WHERE $search" : ""))->fetchAll();
            } catch (\Exception $e) {
                var_dump($e->getMessage());
                $elevi = [];
            }
            break;
        case "cresc_nume":
            try {
                $elevi = $conn->query("SELECT * FROM elevi " . ($search !== "" ? "WHERE $search" : "") . " ORDER BY nume ASC")->fetchAll();
            } catch (\Exception $e) {
                var_dump($e->getMessage());
                $elevi = [];
            }
            break;
        case "sex_masculin":
            try {
                $elevi = $conn->query("SELECT * FROM elevi WHERE sex = 'm' " . ($search !== "" ? "AND $search" : ""))->fetchAll();
            } catch (\Exception $e) {
                var_dump($e->getMessage());
                $elevi = [];
            }
            break;
        case "desc_bac":
            try {
                $elevi = $conn->query("SELECT * FROM elevi " . ($search !== "" ? "WHERE $search" : "") . " ORDER BY media_bac DESC")->fetchAll();
            } catch (\Exception $e) {
                var_dump($e->getMessage());
                $elevi = [];
            }
            break;
        case "media_bac":
            try {
                $elevi = $conn->query("SELECT * FROM elevi WHERE 7 < media_bac AND media_bac < 9 " . ($search !== "" ? "AND $search" : ""))->fetchAll();
            } catch (\Exception $e) {
                var_dump($e->getMessage());
                $elevi = [];
            }
            break;
        case "varsta":
            try {
                $elevi = $conn->query("SELECT * FROM elevi WHERE data_nasterii > '" . date("Y-m-d", strtotime("-18 years")) . "' " . ($search !== "" ? "AND $search" : ""))->fetchAll();
            } catch (\Exception $e) {
                var_dump($e->getMessage());
                $elevi = [];
            }
            break;
        default:
            $elevi = [];
            break;
    }
}

?>
<div>
    <form action="index.php" method="GET">
        <input type="hidden" name="filter" value="<?php echo $filter; ?>">

        <div>
            <label for="nume_serach">Cauta dupa nume</label><br>
            <input type="text" name="search" placeholder="Cauta" value="<?php echo $search_value; ?>">
            <button type="submit">Cauta</button>
        </div>
    </form>
</div>
<table width="100%">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nume</th>
            <th>Prenume</th>
            <th>Adresa</th>
            <th>Email</th>
            <th>Data Nasterii</th>
            <th>Sex</th>
            <th>Media BAC</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($elevi as $elev) : ?>
            <tr>
                <td><?php echo $elev["id"]; ?></td>
                <td><?php echo $elev["nume"]; ?></td>
                <td><?php echo $elev["prenume"]; ?></td>
                <td><?php echo $elev["adresa"]; ?></td>
                <td><?php echo $elev["email"]; ?></td>
                <td><?php echo $elev["data_nasterii"]; ?></td>
                <td><?php echo $elev["sex"]; ?></td>
                <td><?php echo $elev["media_bac"]; ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<a href="?filter=lista">Lista</a><br>
<a href="?filter=cresc_nume">Crescator dupa nume</a><br>
<a href="?filter=sex_masculin">Sex masculin</a><br>
<a href="?filter=desc_bac">Descrescator Bac</a><br>
<a href="?filter=media_bac">7 < media_bac < 9</a> <br>
        <a href="?filter=varsta">varsta < 18</a> <br>