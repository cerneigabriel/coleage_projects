<?php 

if(isset($_POST)) {
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
	if($q1=='' || $q2 =='' || $q3 =='' || $q4 =='' || $q5 =='' || $q6 =='' || $q7 =='' || $q8 =='' || $q9 =='' || $q10 =='' || $q11 =='' || $q12 =='' || $q13 =='' || $q14 =='' || $q15 =='' || $q16 =='' ) {
		echo '<h2>Raspundeti la toate intrebarile.</h2>';
	}
	else {
		$score = 0;
		if($q1 == 1) { // 1
		$score++;
		}
		if($q2 == 3) { // 3
		$score++;
		}
		if($q3 == 2) { // 2
		$score++;
		}
		if($q4 == 5) { // 5
		$score++;
		}
		if($q5 == 'Moldova') { // 
		$score++;
		}
		if($q6 == 1) { // 1
		$score++;
		}
		if($q7 == 3) { // 1
		$score++;
		}
		if($q8 == 2) { // 1
		$score++;
		}
		if($q9 == 2) { // 1
		$score++;
		}
		if($q10 == 2) { // 1
		$score++;
		}
		if($q11 == 2) { // 1
		$score++;
		}
		if($q12 == 2) { // 1
		$score++;
		}
		if($q13 == 2) { // 1
		$score++;
		}
		if($q14 == 2) { // 1
		$score++;
		}
		if($q15 == 2) { // 1
		$score++;
		}
		if($q16 == 2) { // 1
		$score++;
		}
		$score = $score / 16 * 100;
		{
		echo '<h2>Ai trecut testul pe '.$score.'%.</h2>';
		}
	}
}
