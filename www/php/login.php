<?php
session_start();
// echo $_SESSION['user'];
// if (!isset($_SESSION)) session_start();
// session_start();
include 'functions.php';
$type = $_POST['type'];
if ($type == 'login'){
	$login = $_POST['name'];
	$pass =  $_POST['pass'];
	// echo json_encode($login);

	$pdo = setConnect('sptraining', 'GXDj2gx1bNw2Sr27');
	$sql = $pdo->prepare("SELECT * FROM users WHERE login=:login");
	$sql->bindValue(':login', $login);
	$sql->execute();
	$loginRes = false;
	$error_array = $pdo->errorInfo();

	if($pdo->errorCode() != 0000){
	 
		echo "SQL ошибка: " . $error_array[2] . '<br/>';
	}
	$res = $sql->fetch();
	if ($res) {
		if (md5($pass) === $res['password']){
			
			$_SESSION['user'] = $login;
			$loginRes = true;
		} else{
			$loginRes = false;
		}
	}
	
	$result=json_encode($loginRes);
	echo $result;
} elseif($type == 'session') {
	$res1 = session_id();
	$result=json_encode($res1);
	echo $result;
} elseif ($type == 'isSession'){
	$res1=$_SESSION['user'];
	$result=json_encode($res1);
	echo $result;
}
else{
	$q ='logout';
	$_SESSION = array();
	$w = json_encode($q);
	echo $w;	
	
}
?>