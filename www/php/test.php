<?php
include 'functions.php';

$login = 'registrator';
$pass = 'MBRXzWJGffVXsERK';
$pdo = setConnect($login, $pass);
$field1 = 'login, password';
$field2 = 'gtghyg';

	

$sql = $pdo->prepare("INSERT INTO USERS ($field1) VALUES (?,?)");
$sql->bindParam(1, $name);
$sql->bindParam(2, $password);
$name = 'fsda	';
$password = 'eee';
$sql->execute();
	
	$error_array = $pdo->errorInfo();

	if($pdo->errorCode() != 0000){
	 
		echo "SQL ошибка: ";
	


	}
?>