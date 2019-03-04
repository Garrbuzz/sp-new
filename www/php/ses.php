<?php 
include 'functions.php';
// $sesID = $_POST['id'];
// echo json_encode($sesID);	
	$res = 'eee';
	if (isset($_SESSION)){
		$res =  json_encode('qqq');
	} else{
		$res = json_encode('2');
	}
	echo $res;
	
?>