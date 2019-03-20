<?php
include 'functions.php';

$login = 'registrator';
$pass = 'MBRXzWJGffVXsERK';
$pdo = setConnect($login, $pass);
$test = [];
$test['login'] = 'John';
$test['password'] = 'qqq';
$test['profession'] = 'ffffff';
$test['bool1'] = true;
$fields = '';
$values = '';
$i = 1;
foreach($test as $field => $val){
	if ($fields === ''){
		$fields = $fields . $field;
		$values = $values . '?';
	} else if($field === 'reg_date'){

	}else {
		$fields = $fields . ', ' . $field;
		$values = $values . ', ' . '?';
	}
}	
	
echo $fields . $values;
$sql = $pdo->prepare("INSERT INTO USERS ($fields) VALUES ($values)");

foreach($test as $field => $val){
	if ($field === 'reg_date'){
	} else {
		$sql->bindParam($i, $test[$field]);
		$i=$i+1;
	}
}



$sql->execute();
	
	$error_array = $pdo->errorInfo();

	if($pdo->errorCode() != 0000){
	 
		echo "SQL ошибка: ";
	


	}
?>