<?php
// if (!isset($_SESSION)) session_start();


	session_start();
	include 'functions.php';
	$testName = $_POST['testName'];
	$res = $_POST['testRes'];
	$user_id = $_SESSION['user_id'];
	$login = 'registrator';
	$pass = 'MBRXzWJGffVXsERK';
	$pdo = setConnect($login, $pass);
	$sql = $pdo->prepare("INSERT INTO test_results (test_id, user_id, result) VALUES (:name, :user_id, :value)");
	$sql->bindParam(':name', $testName);
	$sql->bindParam(':user_id', $user_id);
	$sql->bindParam(':value', $res);
	$sql->execute();

	echo json_encode('ok');
?>