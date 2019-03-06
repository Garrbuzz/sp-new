<?php 
session_start();
include 'functions.php';
echo $res;
if (isset($_SESSION['user'])){
		$r = true;
	} else{
		$r = false;
	}
	$res = json_encode($r);
		echo $res;

	
?>