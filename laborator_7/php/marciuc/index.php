
<form action="index.php" method="post">
    <p>1. Capitala Moldovei?</p>
    <input type="radio" name="intreb1" value="1" <?php echo (isset($_POST["intreb1"]) && $_POST["intreb1"] == 1 ? "checked" : ""); ?> />Chisinau<br>
    <input type="radio" name="intreb1" value="2" <?php echo (isset($_POST["intreb1"]) && $_POST["intreb1"] == 2 ? "checked" : ""); ?> />Balti<br>
    <input type="radio" name="intreb1" value="3" <?php echo (isset($_POST["intreb1"]) && $_POST["intreb1"] == 3 ? "checked" : ""); ?> />Soroca<br><hr>
    <p>2. Din ce an Moldova este o tara independenta?</p>
    <input type="radio" name="intreb2" value="1" <?php echo (isset($_POST["intreb2"]) && $_POST["intreb2"] == 1 ? "checked" : ""); ?> />1999<br>
    <input type="radio" name="intreb2" value="2" <?php echo (isset($_POST["intreb2"]) && $_POST["intreb2"] == 2 ? "checked" : ""); ?> />1992<br>
    <input type="radio" name="intreb2" value="3" <?php echo (isset($_POST["intreb2"]) && $_POST["intreb2"] == 3 ? "checked" : ""); ?> />1991<br>
    <p>3. Ce an este acum?</p>
    <input type="radio" name="intreb3" value="1" <?php echo (isset($_POST["intreb3"]) && $_POST["intreb3"] == 1 ? "checked" : ""); ?> />2019<br>
    <input type="radio" name="intreb3" value="2" <?php echo (isset($_POST["intreb3"]) && $_POST["intreb3"] == 2 ? "checked" : ""); ?> />2020<br>
    <input type="radio" name="intreb3" value="3" <?php echo (isset($_POST["intreb3"]) && $_POST["intreb3"] == 3 ? "checked" : ""); ?> />2021<br><hr>
    <p>4. Cat este 20-10?</p>
    <input type="number" name="intreb4" value="<?php echo (isset($_POST["intreb4"]) ? $_POST["intreb4"] : ""); ?>"><br><hr>
    <p>5. Chisinau este capitala carei tari?</p>
    <input type="text" name="intreb5" value="<?php echo (isset($_POST["intreb5"]) ? $_POST["intreb5"] : ""); ?>" />
    <p>6. Ce an este acum?</p><br><hr>
    <input type="checkbox" name="intreb6[]" value="1" <?php echo (isset($_POST["intreb6"]) && gettype($_POST["intreb6"]) == 'array' && in_array(1, $_POST["intreb6"]) ? "checked" : ""); ?> /> 2019<br>
    <input type="checkbox" name="intreb6[]" value="2" <?php echo (isset($_POST["intreb6"]) && gettype($_POST["intreb6"]) == 'array' && in_array(2, $_POST["intreb6"]) ? "checked" : ""); ?> /> 2020<br>
    <input type="checkbox" name="intreb6[]" value="3" <?php echo (isset($_POST["intreb6"]) && gettype($_POST["intreb6"]) == 'array' && in_array(3, $_POST["intreb6"]) ? "checked" : ""); ?> /> 2021<br><hr>
    <button type="submit">Verifica</button>
</form>


<?php
if (isset($_POST) && gettype($_POST) == "array" && count ($_POST) > 0) {
    $intrebari = 6;
    $procentaj = 0;

    if (count($_POST) < 6) echo '<p style="color: red;">Raspundeti la toate intrebarile.</p>';
    else {
        if ($_POST['intreb1'] == 1) $procentaj++;
        else echo "Ai gresit la intrebarea 1, raspunsul corect este 1<br>";
        if ($_POST['intreb2'] == 3) $procentaj++;
        else echo "Ai gresit la intrebarea 2, raspunsul corect este 3<br>";
        if ($_POST['intreb3'] == 2) $procentaj++;
        else echo "Ai gresit la intrebarea 3, raspunsul corect este 2<br>";
        if ($_POST['intreb4'] == 10) $procentaj++;
        else echo "Ai gresit la intrebarea 4, raspunsul corect este 10<br>";
        if ($_POST['intreb5'] == 'Moldova') $procentaj++;
        else echo "Ai gresit la intrebarea 5, raspunsul corect este Moldova<br>";
        if (in_array(1, $_POST['intreb6'])) $procentaj++;
        else echo "Ai gresit la intrebarea 6, raspunsul corect este 1<br>";
        $procentaj = (int) ($procentaj / 6) * 100; 
        
        if ($procentaj == 100){
            echo '<p style="color: green;">Ai trecut testul pe ' . $procentaj . '%.</p>';
        } else echo '<p style="color: red;">Ai gresit raspunsurile</p>';
    }
}