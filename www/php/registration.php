<?php
include 'functions.php';
include 'functions.php';
$type = $_POST['type'];

$login = 'registrator';
$pass = 'MBRXzWJGffVXsERK';
$pdo = setConnect();

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