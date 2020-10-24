<table class="table">
    <tr>
        <th>Id</th>
        <th>Nume</th>
        <th>Prenume</th>
        <th>Varsta</th>
        <th>Oras</th>
    </tr>
    <?php foreach ($persoane as $value) : ?>
        <tr>
            <?php foreach ($value as $i) : ?>
                <td><?php echo $i; ?></td>
            <?php endforeach; ?>
        </tr>
    <?php endforeach; ?>
</table>

<br>

<ul>
    <?php foreach ($grouped as $city => $value) : ?>
        <li><?php echo $city; ?></li>
        <ul>
            <?php foreach ($value as $i) : ?>
                <?php foreach ($i as $j) : ?>
                    <li><?php echo $j; ?></li>
                <?php endforeach; ?>
                <br>
            <?php endforeach; ?>
        </ul>
    <?php endforeach; ?>
</ul>

<br>

<table class="table">
    <tr>
        <th>Id</th>
        <th>Nume</th>
        <th>Prenume</th>
        <th>Varsta</th>
        <th>Oras</th>
    </tr>
    <?php foreach ($grouped as $city => $value) : ?>
        <tr>
            <th><?php echo $city; ?></th>
        </tr>
        <?php foreach ($value as $i) : ?>
            <tr>
                <?php foreach ($i as $j) : ?>
                    <td><?php echo $j; ?></td>
                <?php endforeach; ?>
            </tr>
        <?php endforeach; ?>
    <?php endforeach; ?>
</table>