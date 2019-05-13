<?php
// if (!isset($_SESSION)) session_start();
session_start();
include 'functions.php';
$type = $_POST['type'];
$login = 'registrator';
$pass = 'MBRXzWJGffVXsERK';
$pdo = setConnect($login, $pass);
$login = $_SESSION['user'];
$user_id = $_SESSION['user_id'];

$sql = $pdo->prepare("SELECT * FROM users WHERE login=:login");
$sql->bindValue(':login',$login);
	$sql->execute();
	$loginRes = false;
	$error_array = $pdo->errorInfo();

	if($pdo->errorCode() != 0000){
	 
		echo "SQL ошибка: " . $error_array[2] . '<br/>';
	}
	$res = $sql->fetch();




	$sql1 = $pdo->prepare("SELECT * FROM test_results WHERE user_id=:user_id");
	$sql1->bindValue(':user_id',$user_id);
	$sql1->execute();
	$error_array = $pdo->errorInfo();

	if($pdo->errorCode() != 0000){
	 
		echo "SQL ошибка: " . $error_array[2] . '<br/>';
	}
	$test_results = $sql1->fetchAll();


		
	
	$res1 = [
		"r"=>$res,
		"t"=>$test_results];
		

echo json_encode($res1);

	

?>