<?php
// if (!isset($_SESSION)) session_start();
session_start();
include 'functions.php';
$type = $_POST['type'];

	$res1 = $_SESSION['user'];
	$result=json_encode($res1);
	echo $result;

?>