<?php
// if (!isset($_SESSION)) session_start();
session_start();
include 'functions.php';
$testName = $_POST['testName'];
$res = $_POST['testRes'];
$login = 'registrator';
$pass = 'MBRXzWJGffVXsERK';
$pdo = setConnect($login, $pass);
// $testName = 'qqq';
// $res = '33';
// $pdo = setConnect('sptraining','GXDj2gx1bNw2Sr27');
// $login = $_SESSION['user'];

$sql = $pdo->prepare("INSERT INTO TEST_RESULTS (test_id, result) VALUES (:name, :value)");
$sql->bindParam(':name', $testName);
$sql->bindParam(':value', $res);
$sql->execute();
echo json_encode('ok');
?>