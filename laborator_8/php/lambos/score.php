<?php

include 'sql.php';

if (isset($_POST)) {
	$q1 = $_POST['q1'];
	$q2 = $_POST['q2'];
	$q3 = $_POST['q3'];
	$q4 = $_POST['q4'];
	$q5 = $_POST['q5'];
	$q6 = $_POST['q6'];
	$q7 = $_POST['q7'];
	$q8 = $_POST['q8'];
	$q9 = $_POST['q9'];
	$q10 = $_POST['q10'];
	$q11 = $_POST['q11'];
	$q12 = $_POST['q12'];
	$q13 = $_POST['q13'];
	$q14 = $_POST['q14'];
	$q15 = $_POST['q15'];
	$q16 = $_POST['q16'];
	if ($q1 == '' || $q2 == '' || $q3 == '' || $q4 == '' || $q5 == '' || $q6 == '' || $q7 == '' || $q8 == '' || $q9 == '' || $q10 == '' || $q11 == '' || $q12 == '' || $q13 == '' || $q14 == '' || $q15 == '' || $q16 == '') {
		echo '<h2>Raspundeti la toate intrebarile.</h2>';
	} else {
		$score = 0;
		$sql = "SELECT raspuns FROM intrebari WHERE id = ";

		if ($q1 == $pdo->query("$sql'q1'")->fetch()["raspuns"]) $score++;
		else echo "Intrebarea 1 este incorecta, raspunsul corect este Chisinau.<br>";

		if ($q2 == $pdo->query("$sql'q2'")->fetch()["raspuns"]) $score++;
		else echo "Intrebarea 2 este incorecta, raspunsul corect este 1991.<br>";

		if ($q3 == $pdo->query("$sql'q3'")->fetch()["raspuns"]) $score++;
		else echo "Intrebarea 3 este incorecta, raspunsul corect este 2020.<br>";

		if ($q4 == $pdo->query("$sql'q4'")->fetch()["raspuns"]) $score++;
		else echo "Intrebarea 4 este incorecta, raspunsul corect este 5.<br>";

		if ($q5 == $pdo->query("$sql'q5'")->fetch()["raspuns"]) $score++;
		else echo "Intrebarea 5 este incorecta, raspunsul corect este Moldova.<br>";

		if ($q6 == $pdo->query("$sql'q6'")->fetch()["raspuns"]) $score++;
		else echo "Intrebarea 6 este incorecta, raspunsul corect este 2019.<br>";

		if ($q7 == $pdo->query("$sql'q7'")->fetch()["raspuns"]) $score++;
		else echo "Intrebarea 7 este incorecta, raspunsul corect este 20.<br>";

		if ($q8 == $pdo->query("$sql'q8'")->fetch()["raspuns"]) $score++;
		else echo "Intrebarea 8 este incorecta, raspunsul corect este 2020.<br>";

		if ($q9 == $pdo->query("$sql'q9'")->fetch()["raspuns"]) $score++;
		else echo "Intrebarea 9 este incorecta, raspunsul corect este 2020.<br>";

		if ($q10 == $pdo->query("$sql'q10'")->fetch()["raspuns"]) $score++;
		else echo "Intrebarea 10 este incorecta, raspunsul corect este 2020.<br>";

		if ($q11 == $pdo->query("$sql'q11'")->fetch()["raspuns"]) $score++;
		else echo "Intrebarea 11 este incorecta, raspunsul corect este 2020.<br>";

		if ($q12 == $pdo->query("$sql'q12'")->fetch()["raspuns"]) $score++;
		else echo "Intrebarea 12 este incorecta, raspunsul corect este 2020.<br>";

		if ($q13 == $pdo->query("$sql'q13'")->fetch()["raspuns"]) $score++;
		else echo "Intrebarea 13 este incorecta, raspunsul corect este 2020.<br>";

		if ($q14 == $pdo->query("$sql'q14'")->fetch()["raspuns"]) $score++;
		else echo "Intrebarea 14 este incorecta, raspunsul corect este 2020.<br>";

		if ($q15 == $pdo->query("$sql'q15'")->fetch()["raspuns"]) $score++;
		else echo "Intrebarea 15 este incorecta, raspunsul corect este 2020.<br>";

		if ($q16 == $pdo->query("$sql'q16'")->fetch()["raspuns"]) $score++;
		else echo "Intrebarea 16 este incorecta, raspunsul corect este 2020.<br>";

		$score = $score / 16 * 100; {
			echo '<h2>Ai trecut testul pe ' . $score . '%.</h2>';
		}
	}
}
