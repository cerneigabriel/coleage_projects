<table width="100%" border="1" style="border-spacing: 0">
    <thead>
        <tr>
            <th>Id</th>
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
        <?php while ($row = $result->fetch()) : ?>
            <tr>
                <td><?php echo $row["id"]; ?></td>
                <td><?php echo $row["nume"]; ?></td>
                <td><?php echo $row["prenume"]; ?></td>
                <td><?php echo $row["adresa"]; ?></td>
                <td><?php echo $row["email"]; ?></td>
                <td><?php echo $row["data_nasterii"]; ?></td>
                <td><?php echo $row["sex"]; ?></td>
                <td><?php echo $row["media_bac"]; ?></td>
            </tr>
        <?php endwhile; ?>
    </tbody>
</table>