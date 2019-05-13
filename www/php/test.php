<?php
include 'functions.php';

$login = 'registrator';
$pass = 'MBRXzWJGffVXsERK';
$pdo = setConnect($login, $pass);
$user_id = '20';
$sql = $pdo->prepare("SELECT * FROM test_results WHERE user_id=:user_id");
$sql->bindValue(':user_id',$user_id);
	$sql->execute();
	$error_array = $pdo->errorInfo();

	if($pdo->errorCode() != 0000){
	 
		echo "SQL ошибка: " . $error_array[2] . '<br/>';
	}
	$test_results = $sql->fetchAll();


	foreach($test_results as $i => $w){
		foreach ($test_results[$i] as $field => $val){
			echo $field . ' ' . $val . '</br>';
		}
	
	
	}	
	

?>