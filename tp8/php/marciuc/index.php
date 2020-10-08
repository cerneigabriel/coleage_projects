<?php include 'start_sql.php'; ?>

<?php
function executeScript($script)
{
    $data = $_SESSION["db"]->prepare($script);
    $data->execute();
    return $data->fetchAll();
}

if (isset($_SESSION["db"])) {
    $cumparatori = executeScript("SELECT * FROM cumparatori;");
    $vanzatori = executeScript("SELECT * FROM vanzatori;");
    $articole = executeScript("SELECT * FROM articole;");
}
?>

<?php if (isset($cumparatori)) : ?>
    <table border="1" style="border-spacing: 0">
        <tr>
            <th>id_cumparator</th>
            <th>nume</th>
            <th>adresa</th>
            <th>oras</th>
            <th>tara</th>
            <th>cod_postal</th>
        </tr>

        <?php foreach ($cumparatori as $cumparator) : ?>
            <tr>
                <td><?php echo $cumparator['id_cumparator']; ?></td>
                <td><?php echo $cumparator['nume']; ?></td>
                <td><?php echo $cumparator['adresa']; ?></td>
                <td><?php echo $cumparator['oras']; ?></td>
                <td><?php echo $cumparator['tara']; ?></td>
                <td><?php echo $cumparator['cod_postal']; ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
<?php endif; ?>

<br><br>

<?php if (isset($vanzatori)) : ?>
    <table border="1" style="border-spacing: 0">
        <tr>
            <th>id_vanzator</th>
            <th>nume</th>
            <th>adresa</th>
            <th>oras</th>
            <th>tara</th>
            <th>cod_postal</th>
        </tr>

        <?php foreach ($vanzatori as $vanzator) : ?>
            <tr>
                <td><?php echo $vanzator['id_vanzator']; ?></td>
                <td><?php echo $vanzator['nume']; ?></td>
                <td><?php echo $vanzator['adresa']; ?></td>
                <td><?php echo $vanzator['oras']; ?></td>
                <td><?php echo $vanzator['tara']; ?></td>
                <td><?php echo $vanzator['cod_postal']; ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
<?php endif; ?>

<br><br>

<?php if (isset($articole)) : ?>
    <table border="1" style="border-spacing: 0">
        <tr>
            <th>id_articol</th>
            <th>nume</th>
            <th>pret</th>
            <th>vanzator</th>
        </tr>

        <?php foreach ($articole as $articol) : ?>
            <tr>
                <td><?php echo $articol['id_articol']; ?></td>
                <td><?php echo $articol['nume']; ?></td>
                <td><?php echo $articol['pret']; ?></td>
                <td><?php echo executeScript("SELECT `vanzatori`.`nume` FROM `vanzatori` WHERE `vanzatori`.`id_vanzator` = " . $articol['id_vanzator'] . ";")[0]['nume']; ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
<?php endif; ?>

<section>
    <h2>Cumparator Nou</h2>
    <form action="cumparatori.php" method="POST">
        <div>
            <label for="">nume</label>
            <input type="text" name="nume">
        </div>
        <div>
            <label for="">adresa</label>
            <input type="text" name="adresa">
        </div>
        <div>
            <label for="">oras</label>
            <input type="text" name="oras">
        </div>
        <div>
            <label for="">tara</label>
            <input type="text" name="tara">
        </div>
        <div>
            <label for="">cod_postal</label>
            <input type="text" name="cod_postal">
        </div>
        <button type="submit">Trimite</button>
    </form>
</section>

<section>
    <h2>Vanzator Nou</h2>
    <form action="vanzatori.php" method="POST">
        <div>
            <label for="">nume</label>
            <input type="text" name="nume">
        </div>
        <div>
            <label for="">adresa</label>
            <input type="text" name="adresa">
        </div>
        <div>
            <label for="">oras</label>
            <input type="text" name="oras">
        </div>
        <div>
            <label for="">tara</label>
            <input type="text" name="tara">
        </div>
        <div>
            <label for="">cod_postal</label>
            <input type="text" name="cod_postal">
        </div>
        <button type="submit">Trimite</button>
    </form>
</section>

<section>
    <h2>Articol Nou</h2>
    <form action="articole.php" method="POST">
        <div>
            <label for="">nume</label>
            <input type="text" name="nume">
        </div>
        <div>
            <label for="">pret</label>
            <input type="text" name="pret">
        </div>
        <?php if (isset($vanzatori)) : ?>
            <div>
                <label for="">id_vanzator</label>
                <select name="id_vanzator">
                    <?php foreach ($vanzatori as $vanzator) : ?>
                        <option value="<?php echo $vanzator['id_vanzator']; ?>"><?php echo $vanzator['nume']; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
        <?php endif; ?>
        <button type="submit">Trimite</button>
    </form>
</section>