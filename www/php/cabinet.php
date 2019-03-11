<?php
// if (!isset($_SESSION)) session_start();
session_start();
include 'functions.php';
$type = $_POST['type'];
$pdo = setConnect();
$login = $_SESSION['user'];
$sql = $pdo->prepare("SELECT * FROM users WHERE login=:login");
$sql->bindValue(':login',$login);
	$sql->execute();
	$loginRes = false;
	$error_array = $pdo->errorInfo();

	if($pdo->errorCode() != 0000){
	 
		echo "SQL ошибка: " . $error_array[2] . '<br/>';
	}
	$res = $sql->fetch();
echo json_encode($res);

	

?>