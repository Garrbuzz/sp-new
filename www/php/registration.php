<?php
include 'functions.php';
$data = [];
$userFieldsjson = @file_get_contents('users.json');
$userfields = json_decode($userFieldsjson, true);
foreach($userfields as $field => $val){
	$data[$field] = $_POST[$field];
}
$data['password'] = md5($data['password']);
$data['bool1'] = true;
$data['bool2'] = true;

$login = 'registrator';
$pass = 'MBRXzWJGffVXsERK';

$pdo = setConnect($login, $pass);
$fields = '';
$values = '';
$i = 1;
foreach($data as $field => $val){

	if ($fields === ''){
		$fields = $fields . $field;
		$values = $values . '?';
	}  else {
		$fields = $fields . ', ' . $field;
		$values = $values . ', ' . '?';
	}
}	

$sql = $pdo->prepare("SELECT * FROM users WHERE login=:login");
	$sql->bindValue(':login', $data['login']);
	$sql->execute();
	$r = $sql->fetch();
if ($r[bool1]){
	$res = 'loginIsBusy';
}	else{



	$sql = $pdo->prepare("INSERT INTO USERS ($fields) VALUES ($values)");
	foreach($data as $field => $val){
			$sql->bindParam($i, $data[$field]);
			$i=$i+1;
	}
	$sql->execute();
		
		$error_array = $pdo->errorInfo();

		if($pdo->errorCode() != 0000){
		 
			echo "SQL ошибка: ";
		}
		
		$res = true;
}
echo json_encode($res);
?>