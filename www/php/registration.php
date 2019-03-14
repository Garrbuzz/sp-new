<?php
include 'functions.php';
$data = [];
$userFieldsjson = @file_get_contents('users.json');
$userfields = json_decode($userFieldsjson, true);
foreach($userfields as $field => $val){
	$data[$field] = $_POST[$val];
    
}


$login = 'registrator';
$pass = 'MBRXzWJGffVXsERK';
$pdo = setConnect($login, $pass);
$fields = '';
$values = '';
$i = 1;
foreach($userfields as $field => $val){
	if ($fields === ''){
		$fields = $fields . $field;
		$values = $values . '?';
	} else if($field === 'reg_date'){

	}else {
		$fields = $fields . ', ' . $field;
		$values = $values . ', ' . '?';
	}
}	
echo $values;
$userfields['password'] = 'sdfsffghk';
$userfields['bool1'] = 'true';
$userfields['bool2'] = 'true';
echo $userfields['bool2'];
$sql = $pdo->prepare("INSERT INTO USERS ($fields) VALUES ($values)");
foreach($userfields as $field => $val){
	if ($field === 'reg_date'){
	} else {
		$sql->bindParam($i, $userfields[$field]);
		$i=$i+1;
	}
}
$sql->execute();
	
	$error_array = $pdo->errorInfo();

	if($pdo->errorCode() != 0000){
	 
		// echo "SQL ошибка: ";
	}
// }	
	$res = 'qqqqq';
echo json_encode($res);

?>